<?php
namespace App\Controller\Admin;

use App\Entity\Photo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class IncidentPhotoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {return Photo::class;}

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new ('nomFichier', 'Photo de l\'incident')
                ->setBasePath('uploads/incidents')
                ->setUploadDir('public/uploads/incidents')
                ->setUploadedFileNamePattern('[timestamp]-[randomhash].[extension]')
                ->setRequired(true),
        ];
    }
}
