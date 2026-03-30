<?php
namespace App\Controller\Admin;

use App\Controller\Admin\DepensePhotoCrudController;
use App\Entity\CaisseConseil;
use App\Entity\MenueDepense;
use App\Entity\User;
use App\Form\CaisseInitialType;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MenueDepenseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MenueDepense::class;
    }

    private EntityManagerInterface $entityManager;

    // ✨ LA CORRECTION PRO : On charge la base de données à la construction du contrôleur
    // public function __construct(EntityManagerInterface $entityManager)
    // {
    //     $this->entityManager = $entityManager;
    // }

    // 🔒 SECURITÉ
    public function configureCrud(Crud $crud): Crud
    {
        /** @var User $user */
        $user  = $this->getUser();
        $copro = $user->getCopropriete();

        if ($copro && $copro->getCaisseConseil()) {
            $solde = $copro->getCaisseConseil()->getSolde();

            if ($solde < 0) {
                $this->addFlash('danger', sprintf(
                    '⚠️ Attention : la caisse du Conseil Syndical est en déficit (%.2f €).',
                    $solde
                ));
            }
        }

        return $crud
            ->setEntityPermission('ROLE_CONSEIL_S')
            ->setPageTitle('index', 'Menues Dépenses (Caisse CS)')
            ->setPageTitle('new', 'Déclarer un achat');
    }

    public function configureActions(Actions $actions): Actions
    {
        $user  = $this->getUser();
        $copro = $user?->getCopropriete();

        // Action Export Excel
        $exportAction = Action::new ('export', 'Exporter vers Excel', 'fas fa-file-excel')
            ->linkToRoute('admin_export_depenses')
            ->createAsGlobalAction()
            ->setCssClass('btn btn-success')
            ->setHtmlAttributes(['target' => '_blank']);

        // Action Créer la caisse
        $createCaisse = Action::new ('createCaisse', 'Créer ma caisse', 'fas fa-piggy-bank')
            ->linkToRoute('president_create_caisse')
            ->createAsGlobalAction()
            ->setCssClass('btn btn-primary');

        // On ajoute l'action "Créer ma caisse" SEULEMENT si elle n'existe pas
        if (! $copro || ! $copro->getCaisseConseil()) {
            $actions = $actions->add(Crud::PAGE_INDEX, $createCaisse);
        }

        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_INDEX, $exportAction);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new ('id')->hideOnForm(),

            TextField::new ('designation', 'Qu\'avez-vous acheté ?'),
            TextField::new ('fournisseur', 'Magasin / Fournisseur'),
            DateField::new ('dateAchat', 'Date de l\'achat'),
            TextareaField::new ('descriptionUsage', 'À quoi cela va servir ?')->hideOnIndex(),

            // ImageField::new ('photos[0].nomFichier', 'Justificatif')
            //     ->setBasePath('uploads/menues_depenses')
            //     ->onlyOnIndex(),

            CollectionField::new ('photos', 'Justificatifs')
                ->useEntryCrudForm(DepensePhotoCrudController::class)
                ->setTemplatePath('admin/fields/photos_detail.html.twig'), // 👈 On remet le design !, // 👈 Le nouveau spécial dépense
                                                                       // ->hideOnIndex(),

            NumberField::new ('prixUnitaireTtc', 'Prix Unité TTC (€)')->setNumDecimals(2),
            IntegerField::new ('quantite', 'Quantité'),

            NumberField::new ('totalTtc', 'Total TTC (€)')
                ->setNumDecimals(2)
                ->setDisabled()
                ->hideWhenCreating(),

            ChoiceField::new ('statut', 'État du remboursement')->setChoices([
                'En attente de validation' => 'En attente',
                'Validé par le Syndic'     => 'Validé',
                'Remboursement effectué'   => 'Remboursé',
            ])->renderAsBadges([
                'En attente' => 'warning',
                'Validé'     => 'info',
                'Remboursé'  => 'success',
            ])->setDisabled(! $this->isGranted('ROLE_SYNDIC')),


            AssociationField::new ('copropriete', 'Copropriété concernée')
                ->setPermission('ROLE_SYNDIC'),

            // TextField::new ('soldeCaisse', 'Solde caisse (€)')
            //     ->setCustomOption('mapped', false)
            //     ->onlyOnIndex()
            //     ->renderAsHtml()
            //     ->formatValue(function ($value, $depense) {
            //         $copro = $depense->getCopropriete();

            //         if (! $copro || ! $copro->getCaisseConseil()) {
            //             return "<span style='color:gray;'>—</span>";
            //         }

            //         $solde     = $copro->getCaisseConseil()->getSolde();
            //         $formatted = number_format($solde, 2, ',', ' ') . ' €';

            //         if ($solde < 0) {
            //             return "<span style='color:red;font-weight:bold;'>$formatted</span>";
            //         }

            //         return "<span style='color:green;font-weight:bold;'>$formatted</span>";
            //     })
            // ,

        ];
    }

    // 🧮 INTERCEPTION À LA CRÉATION
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (! $entityInstance instanceof MenueDepense) {
            return;
        }

        $this->formatTextData($entityInstance);

        // Calcul du total TTC
        $total = $entityInstance->getPrixUnitaireTtc() * $entityInstance->getQuantite();
        $entityInstance->setTotalTtc($total);

        // Gestion de l'acheteur et de la copropriété
        /** @var User $user */
        $user = $this->getUser();
        $entityInstance->setAcheteur($user);

        if ($entityInstance->getCopropriete() === null) {
            if ($user && method_exists($user, 'getCopropriete') && $user->getCopropriete()) {
                $entityInstance->setCopropriete($user->getCopropriete());
                // 🔗 Lier automatiquement la dépense à la caisse de la copropriété
                $copro = $user->getCopropriete();
                if ($copro && $copro->getCaisseConseil()) {
                    $entityInstance->setCaisseConseil($copro->getCaisseConseil());
                }

            }
        }

        parent::persistEntity($entityManager, $entityInstance);
    }

    // 🧮 INTERCEPTION À LA MODIFICATION
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (! $entityInstance instanceof MenueDepense) {
            return;
        }

        $this->formatTextData($entityInstance);

        // Recalcul du total au cas où les quantités ont changé
        $total = $entityInstance->getPrixUnitaireTtc() * $entityInstance->getQuantite();
        $entityInstance->setTotalTtc($total);

        $copro = $entityInstance->getCopropriete();
        if ($copro && $copro->getCaisseConseil()) {
            $entityInstance->setCaisseConseil($copro->getCaisseConseil());
        }

        parent::updateEntity($entityManager, $entityInstance);
    }

    // 🪄 FONCTION REGROUPÉE POUR LE FORMATAGE DU TEXTE
    public function formatTextData(MenueDepense $entityInstance): void
    {
        if ($entityInstance->getFournisseur()) {
            $entityInstance->setFournisseur(mb_strtoupper($entityInstance->getFournisseur(), 'UTF-8'));
        }

        if ($entityInstance->getDesignation()) {
            $entityInstance->setDesignation(ucfirst($entityInstance->getDesignation()));
        }

        if ($entityInstance->getDescriptionUsage()) {
            $entityInstance->setDescriptionUsage(
                $this->formatSentences($entityInstance->getDescriptionUsage())
            );
        }
    }

    // 🪄 FONCTION D'EXPORT EXCEL (CSV)
    // ✨ NOUVEAU : On déclare une vraie Route Symfony indépendante d'EasyAdmin
    #[Route('/admin/export-depenses', name: 'admin_export_depenses')]
    public function export(EntityManagerInterface $em): Response
    {
        try {
            /** @var User $user */
            $user  = $this->getUser();
            $copro = $user->getCopropriete();

            if ($this->isGranted('ROLE_SYNDIC')) {
                $depenses = $em->getRepository(MenueDepense::class)->findAll();
            } else {
                $depenses = $em->getRepository(MenueDepense::class)->findBy(['copropriete' => $copro]);
            }

            $csvContent = "\xEF\xBB\xBF";
            // ✨ 1. ON AJOUTE L'EN-TÊTE "Copropriété"
            $csvContent .= "ID;Copropriété;Date;Acheteur;Magasin;Designation;Quantite;Prix TTC;Total TTC;Statut\n";

            foreach ($depenses as $depense) {
                $date     = $depense->getDateAchat() ? $depense->getDateAchat()->format('d/m/Y') : '';
                $acheteur = $depense->getAcheteur() ? $depense->getAcheteur()->getUserIdentifier() : 'Inconnu';

                // ✨ 2. ON RÉCUPÈRE LE NOM DE LA COPROPRIÉTÉ (En gérant le cas où elle serait vide)
                // Note : Je suppose que ton entité Copropriete a un getNom(). Si c'est un autre champ, adapte-le !
                $nomCopro = $depense->getCopropriete() ? $depense->getCopropriete()->getNom() : 'Non assignée';

                $nomCopro    = str_replace(';', ',', $nomCopro);
                $fournisseur = str_replace(';', ',', $depense->getFournisseur() ?? '');
                $designation = str_replace(';', ',', $depense->getDesignation() ?? '');

                // ✨ 3. ON AJOUTE UN "%s" ET LA VARIABLE $nomCopro
                $csvContent .= sprintf(
                    "%s;%s;%s;%s;%s;%s;%s;%s;%s;%s\n",
                    $depense->getId(),
                    $nomCopro,
                    $date,
                    $acheteur,
                    $fournisseur,
                    $designation,
                    $depense->getQuantite() ?? 0,
                    number_format($depense->getPrixUnitaireTtc() ?? 0, 2, ',', ''),
                    number_format($depense->getTotalTtc() ?? 0, 2, ',', ''),
                    $depense->getStatut() ?? ''
                );
            }

            $response = new Response($csvContent);
            $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="caisse_depenses.csv"');

            return $response;

        } catch (\Exception $e) {
            dd([
                'Message d\'erreur' => $e->getMessage(),
                'Fichier'           => $e->getFile(),
                'Ligne'             => $e->getLine(),
            ]);
        }
    }

    // 🪄 FONCTION MAISON : Met une majuscule à chaque début de phrase
    public function formatSentences(?string $text): ?string
    {
        if (! $text) {
            return null;
        }

        return preg_replace_callback(
            '/(^|[.!?]\s+)([a-zà-ÿœæ])/iu',
            function ($matches) {
                return $matches[1] . mb_strtoupper($matches[2], 'UTF-8');
            },
            $text
        );
    }

    #[Route('/president/caisse/create', name: 'president_create_caisse')]
    public function createCaisse(Request $request, EntityManagerInterface $em): Response
    {
        $user  = $this->getUser();
        $copro = $user->getCopropriete();

        if (! $copro) {
            $this->addFlash('danger', "Vous n'êtes associé à aucune copropriété.");
            return $this->redirectToRoute('admin');
        }

        if ($copro->getCaisseConseil()) {
            $this->addFlash('warning', "La caisse existe déjà.");
            return $this->redirectToRoute('admin');
        }

        $caisse = new CaisseConseil();
        $form   = $this->createForm(CaisseInitialType::class, $caisse);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $caisse->setCopropriete($copro);
            $em->persist($caisse);
            $em->flush();

            $this->addFlash('success', "Votre caisse a été créée.");
            return $this->redirectToRoute('admin');
        }

        return $this->render('president/caisse_create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}