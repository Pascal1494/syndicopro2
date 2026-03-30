<?php
namespace App\Controller\Admin;

use App\Controller\Admin\Trait\CoproprieteSecuriteTrait;
use App\Entity\Lot;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LotCrudController extends AbstractCrudController
{

    // 👈 2. GLISSE LE TRAIT ICI ! (Ça importe toutes les méthodes du fichier Trait)
    use CoproprieteSecuriteTrait;

    public static function getEntityFqcn(): string
    {
        return Lot::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            IdField::new ('id')->hideOnForm(),
            TextField::new ('numeroLot', 'Numéro de Lot'),
            TextField::new ('type', 'Type de Lot'),
            IntegerField::new ('etage', 'Étage'),
            TextField::new ('porte', 'Porte'),
            IntegerField::new ('tantieme', 'Tantièmes'),
            AssociationField::new ('batiment', 'Bâtiment rattaché'),
            AssociationField::new ('proprietaire', 'Copropriétaire / Bailleur'),
            AssociationField::new ('locataire', 'Locataire actuel'),
        ];

        if ($pageName === Crud::PAGE_DETAIL) {
            $fields[] = AssociationField::new ('badges', 'Badges affectés')
                ->formatValue(function ($value, $entity) {
                    $badges = $entity->getBadges();
                    if ($badges->isEmpty()) {
                        return '<span class="text-muted small">Aucun badge affecté</span>';
                    }

                    $html       = [];
                    $traduction = [
                        'bleu'   => 'blue', 'rouge'   => 'red', 'vert'    => 'green',
                        'jaune'  => 'yellow', 'noir'  => 'black', 'blanc' => 'white',
                        'gris'   => 'grey', 'orange'  => 'orange', 'rose' => 'pink',
                        'marron' => 'brown', 'violet' => 'purple',
                    ];

                    foreach ($badges as $badge) {
                        $status      = strtolower($badge->getStatus() ?? 'inactif');
                        $statusClass = ($status === 'actif') ? 'bg-success' : 'bg-danger';

                        $couleurBrute    = trim($badge->getCouleur() ?: '');
                        $couleurNettoyee = strtolower($couleurBrute);
                        $couleurCSS      = $traduction[$couleurNettoyee] ?? ($couleurNettoyee ?: '#dee2e6');
                        $texteCouleur    = $couleurBrute ?: 'Inconnue';

                        $html[] = sprintf(
                            '<div class="d-flex align-items-center mb-2 pb-2 border-bottom" style="min-width: 380px;">
                            <div style="width: 35px; height: 18px; background-color: %s; border-radius: 4px; margin-right: 15px; border: 1px solid rgba(255,255,255,0.2); box-shadow: 0 1px 3px rgba(0,0,0,0.3);"></div>

                            <span class="fw-bold text-light me-3" style="min-width: 80px; font-size: 0.9rem; letter-spacing: 0.5px;">%s</span>

                            <span class="text-muted me-3">|</span>

                            <span class="me-auto font-monospace text-info" style="font-size: 0.95rem;">%s</span>

                            <span class="badge %s px-2 py-1 ms-3 shadow-sm" style="min-width: 85px; font-size: 0.75rem;">%s</span>
                        </div>',
                            $couleurCSS,
                            ucfirst($texteCouleur),
                            $badge->getNumeroHexa(),
                            $statusClass,
                            strtoupper($status)
                        );
                    }

                    return '<div class="mt-2">' . implode('', $html) . '</div>';
                });
        }

        return $fields;
    }

    // Exemple pour le BatimentCrudController.php

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $qb   = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
        $user = $this->getUser();

        // Si c'est un gardien ou CS, on filtre par SA copropriété
        if ($this->isGranted('ROLE_GARDIEN') && ! $this->isGranted('ROLE_SYNDIC')) {
            // LA CORRECTION EST ICI : On fait un "join" sur le bâtiment
            $qb->join('entity.batiment', 'b')
                ->andWhere('b.copropriete = :userCopro')
                ->setParameter('userCopro', $user->getCopropriete());
        }

        return $qb;
    }

    public function configureActions(Actions $actions): Actions
    {
        // On permet à tout le monde de consulter (le petit œil)
        $actions->add(Crud::PAGE_INDEX, Action::DETAIL);

        // Si l'utilisateur n'est PAS un Syndic (donc si c'est un Membre ou un Gardien)
        if (! $this->isGranted('ROLE_SYNDIC')) {
            // ✨ ON COUPE TOUT : Création, Modification et Suppression
            $actions->disable(Action::NEW , Action::EDIT, Action::DELETE);
        }

        return $actions;
    }
}
