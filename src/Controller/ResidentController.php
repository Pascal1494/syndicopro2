<?php
namespace App\Controller;

use App\Entity\Incident;
use App\Entity\Photo; // 👈 N'oublie pas cet import
use App\Form\IncidentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; // 👈 Et celui-ci
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/mon-espace')]
#[IsGranted('ROLE_USER')] // 👈 ON FORCE ICI
class ResidentController extends AbstractController
{
    #[Route('/resident', name: 'app_resident_home')]
    #[IsGranted('ROLE_USER')]
    public function index(): Response
    {
        $user = $this->getUser();

        // 1. On fusionne les deux types de lots pour Twig
        // On transforme les collections en tableaux pour pouvoir les fusionner
        $lots = array_merge(
            $user->getLotsPossedes()->toArray(),
            $user->getLotsLoues()->toArray()
        );

        // 2. On récupère les incidents (signalements) de l'utilisateur
        // Si tu as une relation 'incidents' dans ton entité User :
        $incidents = $user->getIncidentsDeclares();

        // 3. On envoie les 3 variables indispensables au template
        return $this->render('resident/index.html.twig', [
            'user'      => $user,
            'lots'      => $lots,      // <-- C'est l'absence de cette ligne qui créait l'erreur
            'incidents' => $incidents, // <-- Indispensable pour la colonne de droite
        ]);
    }

    #[Route('/signaler-incident', name: 'app_incident_new')]
    public function new (Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $incident = new Incident();
        $form     = $this->createForm(IncidentType::class, $incident);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // 📸 GESTION DE LA PHOTO
            $photoFile = $form->get('photo_file')->getData();

            if ($photoFile) {
                $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
                // On nettoie le nom du fichier (ex: "Mon Image.jpg" -> "mon-image")
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename  = $safeFilename . '-' . uniqid() . '.' . $photoFile->guessExtension();

                try {
                    // On déplace le fichier dans le dossier configuré dans services.yaml
                    $photoFile->move(
                        $this->getParameter('incidents_directory'),
                        $newFilename
                    );

                    // On crée l'entité Photo et on la lie à l'incident
                    $photo = new Photo();
                    $photo->setNomFichier($newFilename);
                    $photo->setIncident($incident); // Liaison ManyToOne

                    $em->persist($photo); // On dit à Doctrine de sauvegarder la photo
                } catch (FileException $e) {
                    $this->addFlash('danger', "Erreur lors de l'upload de l'image.");
                }
            }

            // Automatisme : infos obligatoires
            $incident->setDeclarant($this->getUser());
            $incident->setDateCreation(new \DateTimeImmutable());
            $incident->setStatut('Nouveau');

            $em->persist($incident);
            $em->flush();

            $this->addFlash('success', 'Votre signalement a bien été pris en compte.');
            return $this->redirectToRoute('app_resident_home');
        }

        return $this->render('resident/new_incident.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
