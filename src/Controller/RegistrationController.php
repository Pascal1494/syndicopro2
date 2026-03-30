<?php
namespace App\Controller;

use App\Entity\Lot;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\BatimentRepository;
use App\Repository\UserRepository;
use App\Security\AppCustomAuthenticator;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    public function __construct(private EmailVerifier $emailVerifier)
    {
    }

    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        Security $security,
        EntityManagerInterface $entityManager
    ): Response {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // 1. Récupération des infos de localisation pour la recherche du Lot
            $batiment = $form->get('batiment')->getData();
            $etage    = $form->get('etage')->getData();
            $porte    = $form->get('porte')->getData();

            // 2. LOGIQUE DÉTECTIVE : Trouver le lot correspondant
            $lot = $entityManager->getRepository(Lot::class)->findOneBy([
                'batiment' => $batiment,
                'etage'    => $etage,
                'porte'    => $porte,
            ]);

            if ($lot) {
                // On lie l'utilisateur à son lot et sa copropriété
                $user->setCopropriete($batiment->getCopropriete());

                // On considère ici que l'inscrit est le propriétaire (à adapter selon tes besoins)
                $lot->setProprietaire($user);

                $this->addFlash('success', 'Nous avons identifié votre lot n°' . $lot->getNumeroLot() . ' !');
            } else {
                $this->addFlash('warning', 'Aucun lot trouvé pour ces coordonnées. Un administrateur devra valider votre fiche.');
            }

            // 3. Hashage du mot de passe
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();
            $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));

            // 4. Attribution du rôle par défaut
            $user->setRoles(['ROLE_USER']);

            $entityManager->persist($user);
            $entityManager->flush();

            // 5. Envoi de l'email de confirmation
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('noreply@syndic-copro.fr', 'SyndicPro'))
                    ->to((string) $user->getEmail())
                    ->subject('Veuillez confirmer votre email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );

            // 6. Connexion automatique et redirection vers l'espace résident
            $security->login($user, AppCustomAuthenticator::class, 'main');

            return $this->redirectToRoute('app_resident_home');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }

    /**
     * Cette route sera appelée en JavaScript (AJAX) pour filtrer les bâtiments par copropriété
     */
    #[Route('/get-batiments/{coproId}', name: 'app_get_batiments_by_copro', methods: ['GET'])]
    public function getBatimentsByCopro(int $coproId, BatimentRepository $batimentRepo): JsonResponse
    {
        $batiments = $batimentRepo->findBy(['copropriete' => $coproId]);

        $responseArray = [];
        foreach ($batiments as $bat) {
            $responseArray[] = [
                'id'  => $bat->getId(),
                'nom' => $bat->getNom(),
            ];
        }

        return new JsonResponse($responseArray);
    }

    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator, UserRepository $userRepository): Response
    {
        $id = $request->query->get('id');

        if (null === $id) {
            return $this->redirectToRoute('app_register');
        }

        $user = $userRepository->find($id);

        if (null === $user) {
            return $this->redirectToRoute('app_register');
        }

        try {
            $this->emailVerifier->handleEmailConfirmation($request, $user);
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        $this->addFlash('success', 'Votre adresse email a été vérifiée.');

        return $this->redirectToRoute('app_resident_home');
    }
}
