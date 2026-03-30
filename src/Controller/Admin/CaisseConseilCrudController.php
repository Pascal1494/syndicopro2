<?php
namespace App\Controller\Admin;

use App\Entity\CaisseConseil;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CaisseConseilCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CaisseConseil::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new ('id')->onlyOnIndex(),

            // Copropriété liée (lecture seule après création)
            AssociationField::new ('copropriete', 'Copropriété')
                ->setRequired(true)
                ->setFormTypeOption('disabled', $pageName !== 'new'),

            // Montant initial
            NumberField::new ('montantInitial', 'Montant initial (€)')
                ->setNumDecimals(2)
                ->setFormTypeOption('attr', ['step' => '0.01']),

            TextField::new ('soldeAffiche', 'Solde actuel (€)')
                ->onlyOnIndex()
                ->renderAsHtml()
                ->formatValue(function ($value, CaisseConseil $caisse) {
                    $solde     = $caisse->getSolde();
                    $formatted = number_format($solde, 2, ',', ' ') . ' €';

                    if ($solde < 0) {
                        return "<span style='color:red;font-weight:bold;'>$formatted</span>";
                    }

                    return "<span style='color:green;font-weight:bold;'>$formatted</span>";
                }),

            // // Solde calculé automatiquement
            // TextField::new ('soldeVirtuel', 'Solde actuel (€)')
            //     ->setCustomOption('mapped', false)
            //     ->onlyOnIndex()
            //     ->formatValue(function ($value, CaisseConseil $caisse) {
            //         $solde = $caisse->getSolde();

            //         if ($solde === null) {
            //             return '—';
            //         }

            //         return number_format($solde, 2, ',', ' ') . ' €';
            //     }),

            // Liste des dépenses associées (lecture seule)
            CollectionField::new ('depenses', 'Dépenses')
                ->onlyOnDetail()
                ->setTemplatePath('admin/fields/depenses_list.html.twig'),
        ];
    }
}