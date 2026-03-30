<?php
namespace App\Controller\Admin;

use App\Controller\Admin\Trait\CoproprieteSecuriteTrait;
use App\Entity\Batiment;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BatimentCrudController extends AbstractCrudController
{
    // 👈 2. GLISSE LE TRAIT ICI ! (Ça importe toutes les méthodes du fichier Trait)
    use CoproprieteSecuriteTrait;

    public static function getEntityFqcn(): string
    {
        return Batiment::class;
    }

    // public function configureFields(string $pageName): iterable
    // {
    //     return [
    //         IdField::new ('id')->hideOnForm(),
    //         TextField::new ('nom', 'Nom du Bâtiment'),
    //         IntegerField::new ('nombreEtage', 'Nombre d\'étages'),

    //         // ✨ LA CORRECTION EST LÀ : On ajoute le champ pour choisir la copropriété
    //         AssociationField::new ('copropriete', 'Copropriété rattachée'),
    //         BooleanField::new ('asAscenceur', 'Présence d\'un ascenseur'),
    //     ];
    // }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new ('id')->hideOnForm(),
            TextField::new ('nom', 'Nom du Bâtiment'),
            IntegerField::new ('nombreEtage', 'Nombre d\'étages'),
            AssociationField::new ('copropriete', 'Copropriété rattachée')
                ->setQueryBuilder($this->getCoproprieteQueryBuilder()),
            BooleanField::new ('asAscenceur', 'Présence d\'un ascenseur'),
        ];
    }

    // 🛑 1. GESTION DES BOUTONS (Cacher "Ajouter/Modifier/Supprimer" au Gardien)
    public function configureActions(Actions $actions): Actions
    {
        // On ajoute le bouton "Détail" (l'icône de l'œil) pour tout le monde
        $actions->add(Crud::PAGE_INDEX, Action::DETAIL);

        // Si l'utilisateur n'est PAS un Président (Conseil Syndical) ou un Syndic...
        // ... donc si c'est un simple Gardien :
        if (! $this->isGranted('ROLE_CONSEIL_S')) {
            // On désactive les actions d'écriture
            $actions->disable(Action::NEW , Action::EDIT, Action::DELETE);
        }

        return $actions;
    }

    // public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    // {
    //     $qb   = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
    //     $user = $this->getUser();

    //     // Si c'est un gardien ou CS, on filtre par SA copropriété
    //     if ($this->isGranted('ROLE_GARDIEN') && ! $this->isGranted('ROLE_SYNDIC')) {
    //         $qb->andWhere('entity.copropriete = :userCopro')
    //             ->setParameter('userCopro', $user->getCopropriete());
    //     }

    //     return $qb;
    // }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);

        // Le Syndic voit tout, on ne filtre pas
        if ($this->isGranted('ROLE_SYNDIC')) {
            return $qb;
        }

        // Le Gardien/Président ne voit que sa copropriété
        $user = $this->getUser();
        if ($user && $user->getCopropriete()) {
            $qb->andWhere('entity.copropriete = :macopro')
                ->setParameter('macopro', $user->getCopropriete());
        } else {
            // Sécurité anti-fuite de données si l'utilisateur n'a pas de copro assignée
            $qb->andWhere('1 = 0');
        }

        return $qb;
    }
}
