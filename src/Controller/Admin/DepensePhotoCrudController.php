<?php
namespace App\Controller\Admin;

use App\Entity\Photo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class DepensePhotoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Photo::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // Le champ magique d'EasyAdmin pour gérer l'upload
            ImageField::new ('nomFichier', 'Sélectionner le fichier à transmettre')
                ->setBasePath('uploads/menues_depenses')                 // Chemin de lecture
                ->setUploadDir('public/uploads/menues_depenses')         // Chemin d'enregistrement physique
                ->setUploadedFileNamePattern('[randomhash].[extension]') // Renomme le fichier pour éviter les doublons
                ->setRequired(true),
        ];
    }
}
