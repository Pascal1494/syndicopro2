<?php
namespace App\Controller\Admin;

use App\Controller\Admin\Trait\CoproprieteSecuriteTrait;
use App\Entity\Copropriete;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CoproprieteCrudController extends AbstractCrudController
{
    // 👈 2. GLISSE LE TRAIT ICI ! (Ça importe toutes les méthodes du fichier Trait)
    use CoproprieteSecuriteTrait;

    public static function getEntityFqcn(): string
    {
        return Copropriete::class;
    }

    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new ('id')->hideOnForm(),
            TextField::new ('nom', 'Nom de la résidence'),
            TextField::new ('adresse', 'Adresse'),
            TextField::new ('ville', 'Ville'),
            TextField::new ('codePostal', 'Code Postal'),

            // On affiche le nombre de bâtiments liés (lecture seule)
            AssociationField::new ('batiments', 'Nombre de bâtiments')->hideOnForm(),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        // On s'assure que le bouton "Consulter" (Détail) est dispo pour tout le monde
        $actions->add(Crud::PAGE_INDEX, Action::DETAIL);

        // 🔒 SÉCURITÉ : Si l'utilisateur n'est PAS le Syndic (donc si c'est un Membre ou un Gardien)
        if (! $this->isGranted('ROLE_SYNDIC')) {
            // On lui retire les droits de modification, création et suppression
            $actions->disable(Action::EDIT, Action::NEW , Action::DELETE);
        }

        return $actions;
    }
    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);

        // Si c'est le Syndic, il voit toutes les copropriétés
        if ($this->isGranted('ROLE_SYNDIC')) {
            return $qb;
        }

        $user = $this->getUser();

        // Si c'est un Membre ou Gardien, il ne voit QUE sa propre copropriété
        if ($user && $user->getCopropriete()) {
            // ✨ LA CORRECTION EST ICI : on utilise "entity = :macopro" (et non entity.copropriete)
            // car "entity" représente déjà la table Copropriete dans ce contrôleur précis.
            $qb->andWhere('entity = :macopro')
                ->setParameter('macopro', $user->getCopropriete());
        } else {
            // Sécurité : s'il n'a pas de copro, il ne voit rien
            $qb->andWhere('1 = 0');
        }

        return $qb;
    }
}
