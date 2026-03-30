<?php
namespace App\Controller\Admin\Trait;

use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;

trait CoproprieteSecuriteTrait
{
    // 🎯 1. Filtre la VUE EN LISTE pour ne montrer que la copropriété de l'utilisateur
    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);

        if ($this->isGranted('ROLE_SYNDIC')) {
            return $qb; // Le Syndic voit tout
        }

        $user = $this->getUser();
        if ($user && $user->getCopropriete()) {
            $qb->andWhere('entity.copropriete = :macopro')
                ->setParameter('macopro', $user->getCopropriete());
        } else {
            $qb->andWhere('1 = 0'); // Sécurité absolue
        }

        return $qb;
    }

    // 🔒 2. Outil pour filtrer les LISTES DÉROULANTES dans les formulaires
    protected function getCoproprieteQueryBuilder(): \Closure
    {
        return function (QueryBuilder $qb) {
            if ($this->isGranted('ROLE_SYNDIC')) {
                return $qb;
            }

            $user = $this->getUser();
            if ($user && $user->getCopropriete()) {
                return $qb->andWhere('entity.id = :macopro')
                    ->setParameter('macopro', $user->getCopropriete());
            }

            return $qb->andWhere('1 = 0');
        };
    }

    // 🔒 3. Outil pour filtrer les entités liées (Lots, Bâtiments, Badges...)
    // Par défaut, on cherche si l'entité possède une relation 'copropriete'
    protected function getEntiteLieeQueryBuilder(string $cheminRelation = 'entity.copropriete'): \Closure
    {
        return function (QueryBuilder $qb) use ($cheminRelation) {
            // Le Syndic voit tous les lots/bâtiments de toutes les copropriétés
            if ($this->isGranted('ROLE_SYNDIC')) {
                return $qb;
            }

            $user = $this->getUser();
            if ($user && $user->getCopropriete()) {
                // On filtre : le champ 'copropriete' du Lot doit être celui de l'utilisateur
                return $qb->andWhere($cheminRelation . ' = :macopro')
                    ->setParameter('macopro', $user->getCopropriete());
            }

            // Sécurité absolue
            return $qb->andWhere('1 = 0');
        };
    }

    public function configureCrud(Crud $crud): Crud
    {
        // On demande au contrôleur actuel s'il a défini une liste de champs de recherche
        if (method_exists($this, 'getChampsDeRecherche')) {
            // Si oui, on les applique à la barre de recherche globale
            $crud->setSearchFields($this->getChampsDeRecherche());
        }

        return $crud;
    }
}
