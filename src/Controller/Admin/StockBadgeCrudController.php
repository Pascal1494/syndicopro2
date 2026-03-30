<?php
namespace App\Controller\Admin;

use App\Controller\Admin\Trait\CoproprieteSecuriteTrait;
use App\Entity\StockBadge;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class StockBadgeCrudController extends AbstractCrudController
{
    use CoproprieteSecuriteTrait; // 👈 2. Activation de la sécurité !

    public static function getEntityFqcn(): string
    {
        return StockBadge::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // AssociationField va chercher automatiquement le nom de la Copro et de la Couleur
            AssociationField::new ('copropriete', 'Copropriété'),
            AssociationField::new ('couleur', 'Couleur de badge'),

            IntegerField::new ('quantite', 'Quantité en stock')
                ->formatValue(function ($value) {
                    // Petit bonus visuel : on met en rouge si le stock est à 0
                    return $value === 0 ? '<span class="text-danger"><strong>0 (Rupture)</strong></span>' : $value;
                }),

            IntegerField::new ('seuilAlerte', 'Seuil d\'alerte (Email)'),
        ];
    }
}
