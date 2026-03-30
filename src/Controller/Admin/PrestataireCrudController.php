<?php
namespace App\Controller\Admin;

use App\Controller\Admin\Trait\CoproprieteSecuriteTrait;
use App\Entity\Prestataire;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PrestataireCrudController extends AbstractCrudController
{
    use CoproprieteSecuriteTrait; // On garde le Trait pour utiliser getCoproprieteQueryBuilder()

    public static function getEntityFqcn(): string
    {
        return Prestataire::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new ('nom', 'Nom de l\'entreprise'),
            TextField::new ('domaine', 'Secteur d\'activité'),
            EmailField::new ('email', 'Email de contact'),
            TextField::new ('telephone', 'Téléphone'),

            // ✨ On filtre la liste déroulante avec l'outil du Trait !
            AssociationField::new ('coproprietes', 'Intervient dans les résidences')
                ->setFormTypeOptions([
                    'by_reference' => false, // Important pour le ManyToMany
                ])
                ->setQueryBuilder($this->getCoproprieteQueryBuilder()), // 👈 Ajout de la sécurité ici
        ];
    }

    // ✨ ON ÉCRASE CELLE DU TRAIT POUR GÉRER LE MANYTOMANY (Le "s" à coproprietes)
    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);

        // Le Syndic voit tous les prestataires
        if ($this->isGranted('ROLE_SYNDIC')) {
            return $qb;
        }

        $user = $this->getUser();
        if ($user && $user->getCopropriete()) {
            // "MEMBER OF" vérifie si la copro de l'utilisateur est DANS la liste des copropriétés du prestataire
            $qb->andWhere(':macopro MEMBER OF entity.coproprietes')
                ->setParameter('macopro', $user->getCopropriete());
        } else {
            $qb->andWhere('1 = 0');
        }

        return $qb;
    }
}
