<?php
namespace App\Controller\Admin;

use App\Entity\Incident;
use App\Entity\User;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IncidentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Incident::class;
    }

    // ✨ NOUVEAU : On active la vue "Détail" (l'icône Œil dans la liste)
    public function configureActions(Actions $actions): Actions
    {
        // On récupère l'action "NEW" (le bouton ajouter)
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW , function (Action $action) {
                // On n'affiche le bouton "Ajouter" que pour le SYNDIC
                return $action->displayIf(static function () {
                    // Symfony vérifie ici si l'utilisateur connecté est Syndic
                    return 'ROLE_SYNDIC';
                });
            })
            // Optionnel : tu peux aussi autoriser le détail pour tout le monde (Conseil, Gardien)
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureFields(string $pageName): iterable
    {

        // 🛡️ Vérification du rôle
        $isSyndic = $this->isGranted('ROLE_SYNDIC');

        return [
            IdField::new ('id')->hideOnForm(),
            TextField::new ('titre', 'Nature de l\'incident')
                ->setDisabled($pageName !== Crud::PAGE_DETAIL)
                ->setDisabled(! $isSyndic),

            // ✨ On affiche la première photo de la collection
            // Note : On utilise 'photos' car c'est lenomdelarelationdanstonentitéIncident;
            ImageField::new ('photos[0].nomFichier', 'Photo')
                ->setBasePath('uploads/incidents') // Chemin public pour l'affichage
                ->onlyOnIndex(),                   // On ne l'affiche que dans la liste pour ne pas alourdir

            TextareaField::new ('description', 'Description détaillée')
                ->hideOnIndex()
                ->setDisabled($pageName !== Crud::PAGE_DETAIL)
                ->setDisabled(! $isSyndic),

            // // La photo (visible sur la liste et sur "l'œil", mais cachée dans le formulaire)
            // ImageField::new ('photos[0].nomFichier', 'Photo')
            //     ->setBasePath('uploads/incidents')
            //     ->hideOnForm(),

            // 📸 AJOUT/EDITION DES PHOTOS (UNIQUEMENT POUR LE SYNDIC)
            // C'est ce champ qui permet d'insérer des images !
            CollectionField::new ('photos', 'Photos de l\'incident')
                ->useEntryCrudForm(IncidentPhotoCrudController::class) // Utilise ton contrôleur de photo
                ->hideOnIndex()
                ->setPermission('ROLE_SYNDIC'), // Seul le syndic verra ce bloc de téléchargement

            ChoiceField::new ('statut')->setChoices([
                'Nouveau'  => 'Nouveau',
                'En cours' => 'En cours',
                'Résolu'   => 'Résolu',
                'Annulé'   => 'Annulé',
            ])->renderAsBadges([
                'Nouveau'  => 'info',
                'En cours' => 'warning',
                'Résolu'   => 'success',
                'Annulé'   => 'danger',
            ]),

            // ✨ NOUVEAU : LES DATES D'INTERVENTION (Modifiables par le gardien)
            DateTimeField::new ('dateIntervention', 'Intervention prévue le')
                ->setFormat('dd/MM/yyyy HH:mm')
                ->hideOnIndex(), // Caché dans la liste pour aérer

            DateTimeField::new ('dateResolution', 'Réparé le')
                ->setFormat('dd/MM/yyyy HH:mm')
                ->hideOnIndex(),

            // ✨ NOUVEAU : Le champ commentaire pour le gardien/réparateur
            TextareaField::new ('commentaireReparateur', 'Mot du réparateur / Gardien')
                ->hideOnIndex(), // On le cache dans la liste générale pour ne pas prendre trop de place

            AssociationField::new ('batiment', 'Bâtiment')
                ->setDisabled(! $isSyndic), // 👈 Grise le champ pour empêcher la modification,
            AssociationField::new ('declarant', 'Déclaré par')
                ->setDisabled(! $isSyndic), // 👈 Grise le champ,
            DateTimeField::new ('dateCreation', 'Le')
                ->setFormat('dd/MM/yyyy HH:mm')
                ->setDisabled(! $isSyndic) // 👈 Grise la date de création aussi (on ne voyage pas dans le temps !)
            ,
        ];
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);

        /** @var User $user */
        $user  = $this->getUser();
        $copro = $user->getCopropriete();

        // Si l'utilisateur n'est pas un Super-Admin (Syndic), on filtre par sa copro
        if (! $this->isGranted('ROLE_SYNDIC') && $copro) {
            $qb->join('entity.batiment', 'b')
                ->andWhere('b.copropriete = :copro')
                ->setParameter('copro', $copro);
        }

        return $qb;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
