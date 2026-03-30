<?php
namespace App\Controller\Admin;

use App\Entity\Document;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DocumentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Document::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new ('titre', 'Nom du document'),
            ChoiceField::new ('categorie', 'Catégorie')->setChoices([
                'Procès-Verbal d\'AG'      => 'AG',
                'Règlement de copropriété' => 'REGLEMENT',
                'Contrat'                  => 'CONTRAT',
                'Diagnostic'               => 'DIAGNOSTIC',
                'Autre'                    => 'AUTRE',
                'Contrat Chauffage'        => 'CHAUFFAGE',
            ]),

            // ✨ LE REVOILÀ !
            ChoiceField::new ('visibilite', 'Accès')->setChoices([
                'Public (Tous les résidents)' => 'PUBLIC',
                'Privé (Conseil & Syndic)'    => 'PRIVE',
            ])->renderAsBadges([
                'PUBLIC' => 'success',
                'PRIVE'  => 'warning',
            ]),

            // 📂 On utilise le champ "file" (virtuel) pour l'upload
            Field::new ('file', 'Fichier (PDF ou Image)')
                ->setFormType(FileType::class)
                ->onlyOnForms()
                ->setRequired($pageName === 'new'),

            // 🔗 On utilise "nomFichier" (la string en DB) pour le bouton
            TextField::new ('nomFichier', 'Document')
                ->setTemplatePath('admin/fields/download_document.html.twig')
                ->onlyOnIndex(),

            AssociationField::new ('copropriete', 'Résidence')->setPermission('ROLE_SYNDIC'),
            AssociationField::new ('createur', 'Ajouté par')->hideOnForm(),
            DateField::new ('dateCreation', 'Date d\'ajout')->hideOnForm(),
        ];
    }

    private function handleFileUpload(Document $document): void
    {
        // On récupère le fichier depuis le champ virtuel "file"
        $file = $document->getFile();

        if ($file instanceof UploadedFile) {
            $fileName = bin2hex(random_bytes(6)) . '.' . $file->guessExtension();

            $file->move(
                $this->getParameter('kernel.project_dir') . '/public/uploads/documents',
                $fileName
            );

            // On enregistre SEULEMENT le nom final en base de données
            $document->setNomFichier($fileName);
        }

        // Remplissage auto du créateur/date/copro (identique à avant)
        if (! $document->getId()) {
            /** @var User $user */
            $user = $this->getUser();
            $document->setCreateur($user);
            $document->setDateCreation(new \DateTimeImmutable());
            if ($document->getCopropriete() === null && $user->getCopropriete()) {
                $document->setCopropriete($user->getCopropriete());
            }
        }
    }

    // N'oublie pas de garder persistEntity et updateEntity qui appellent handleFileUpload !
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->handleFileUpload($entityInstance);
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->handleFileUpload($entityInstance);
        parent::updateEntity($entityManager, $entityInstance);
    }
}
