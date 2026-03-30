<?php
namespace App\Controller\Admin;

use App\Controller\Admin\Trait\CoproprieteSecuriteTrait;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCrudController extends AbstractCrudController
{
    use CoproprieteSecuriteTrait; // 👈 Activation du Trait pour la liste déroulante

    // 1. Injection du service pour crypter le mot de passe
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        // 1. La base : tout utilisateur autorisé à créer un compte peut au moins créer un "Résident"
        $choixRoles = [
            'Résident' => 'ROLE_USER',
        ];

        // 2. Si c'est au moins un Gardien
        if ($this->isGranted('ROLE_GARDIEN')) {
            $choixRoles['Gardien'] = 'ROLE_GARDIEN';
        }

        // 3. Si c'est au moins un Membre du Conseil
        if ($this->isGranted('ROLE_MEMBRE')) {
            $choixRoles['Membre du Conseil'] = 'ROLE_MEMBRE';
        }

        // 4. Si c'est au moins le Président du Conseil
        if ($this->isGranted('ROLE_CONSEIL_S')) {
            $choixRoles['Président du Conseil'] = 'ROLE_CONSEIL_S';
        }

        // 5. 🔒 UNIQUEMENT le Syndic peut créer d'autres Syndics ou des Comptables
        if ($this->isGranted('ROLE_SYNDIC')) {
            $choixRoles['Comptable']               = 'ROLE_COMPTABLE';
            $choixRoles['Syndic (Administrateur)'] = 'ROLE_SYNDIC';
        }

        return [
            IdField::new ('id')->hideOnForm(),

            EmailField::new ('email', 'Adresse Email'),

            TextField::new ('nom', 'Nom de famille'),
            TextField::new ('prenom', 'Prénom'),
            TextField::new ('telephone', 'Téléphone'),

            // ✨ Le fameux champ pour lier l'utilisateur à sa résidence filtrée !
            AssociationField::new ('copropriete', 'Copropriété rattachée')
                ->setQueryBuilder($this->getCoproprieteQueryBuilder()),

            // ✨ 1er Champ : Le statut d'habitation (indépendant des droits)
            ChoiceField::new ('statutOccupation', 'Statut dans la résidence')
                ->setChoices([
                    'Locataire'                  => 'Locataire',
                    'Propriétaire'               => 'Propriétaire',
                    'Non applicable (Staff/Ext)' => '', // 👈 Enregistre du vide en BDD !
                ])
                ->renderExpanded()
                ->setRequired(true)
                ->renderAsBadges([
                    'Locataire'    => 'info',     // Bleu clair
                    'Propriétaire' => 'success', // Vert
                ]),

            // ✨ 2ème Champ : Les droits informatiques (notre fameux escalier avec le champ virtuel 'role')
            ChoiceField::new ('role', 'Droits d\'accès à l\'application')
                ->setChoices($choixRoles)
                ->renderExpanded()
                ->setRequired(true)
            // 👇 ATTENTION : On utilise bien les valeurs de la BDD (ROLE_...) pour lier les couleurs
                ->renderAsBadges([
                    'ROLE_USER'      => 'secondary', // Gris (Utilisateur standard)
                    'ROLE_GARDIEN'   => 'info',      // Bleu clair
                    'ROLE_MEMBRE'    => 'primary',   // Bleu foncé
                    'ROLE_CONSEIL_S' => 'success',   // Vert (Président)
                    'ROLE_COMPTABLE' => 'warning',   // Jaune
                    'ROLE_SYNDIC'    => 'danger',    // Rouge (Droit suprême)
                ]),
            TextField::new ('plainPassword', 'Mot de passe')
                ->setFormType(PasswordType::class)          // Affiche des étoiles
                ->setRequired($pageName === Crud::PAGE_NEW) // Obligatoire seulement à la création !
                ->onlyOnForms(),                            // Masqué dans la liste
        ];
    }

    // ✨ LA NOUVELLE FONCTION MAGIQUE
    public function nettoyerTelephone($user): void
    {
        if ($user instanceof User && $user->getTelephone()) {
            $tel = $user->getTelephone();

            // 1. On garde uniquement les chiffres et le '+'
            $tel = preg_replace('/[^0-9+]/', '', $tel);

            // 2. Si ça commence par +33, on remplace par 0
            if (str_starts_with($tel, '+33')) {
                $tel = '0' . substr($tel, 3);
            }

            // 3. ✨ CORRECTION FAKER : Si le numéro commence par "00" (à cause du (0) de Faker)
            if (str_starts_with($tel, '00')) {
                // On enlève le premier zéro
                $tel = substr($tel, 1);
            }

            // On limite à 10 caractères maximum pour éviter l'erreur SQL "Data too long"
            $tel = substr($tel, 0, 10);

            $user->setTelephone($tel);
        }
    }

    // --- INTERCEPTIONS POUR HASHER LE MOT DE PASSE ---

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->hashPassword($entityInstance);
        $this->nettoyerTelephone($entityInstance);
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->hashPassword($entityInstance);
        $this->nettoyerTelephone($entityInstance);
        parent::updateEntity($entityManager, $entityInstance);
    }

    private function hashPassword($user): void
    {
        // Si un mot de passe a été tapé dans le formulaire
        if ($user instanceof User && $user->getPlainPassword()) {
            $hashedPassword = $this->passwordHasher->hashPassword($user, $user->getPlainPassword());
            $user->setPassword($hashedPassword);

            // On nettoie la propriété en mémoire par sécurité
            $user->setPlainPassword(null);
        }

    }

    // --- FILTRE DE LA VUE LISTE ---

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        // On récupère la requête par défaut
        $qb   = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
        $user = $this->getUser();

        // Si c'est un gardien ou CS, on filtre par SA copropriété et on cache les Syndics !
        if ($this->isGranted('ROLE_GARDIEN') && ! $this->isGranted('ROLE_SYNDIC')) {
            $qb->andWhere('entity.copropriete = :userCopro')
                ->andWhere('entity.roles NOT LIKE :roleAdmin') // Sécurité extra
                ->setParameter('userCopro', $user->getCopropriete())
                ->setParameter('roleAdmin', '%ROLE_SYNDIC%');
        }

        return $qb;
    }

    // use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

// ...

    // public function configureCrud(Crud $crud): Crud
    // {
    //     return $crud
    //     // Tu peux aussi en profiter pour personnaliser le titre de la page
    //         ->setPageTitle('index', 'Liste des Utilisateurs')

    //         // ✨ C'EST ICI QUE TOUT SE PASSE
    //         ->setSearchFields([
    //             'nom',
    //             'prenom',
    //             'email',
    //             'telephone',
    //             'statutOccupation', // Permet de taper "Locataire" ou "Propriétaire"
    //         ]);
    // }

    public function getChampsDeRecherche(): array
    {
        return [
            'nom',
            'prenom',
            'email',
            'statutOccupation', // Permet de chercher "Locataire" ou "Propriétaire"
            'roles',
            'telephone',
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
        // Ton filtre existant pour le statut
            ->add(ChoiceFilter::new ('statutOccupation', 'Statut (Locataire/Propriétaire)')
                    ->setChoices([
                        'Locataire'    => 'Locataire',
                        'Propriétaire' => 'Propriétaire',
                    ])
            )
            // ✨ LE NOUVEAU FILTRE POUR LES DROITS D'ACCÈS
            ->add(ChoiceFilter::new ('roles', 'Droits d\'accès à l\'application')
                    ->setChoices([
                        'Utilisateur standard'    => 'ROLE_USER',
                        'Gardien'                 => 'ROLE_GARDIEN',
                        'Membre du Conseil'       => 'ROLE_MEMBRE',
                        'Président du Conseil'    => 'ROLE_CONSEIL_S',
                        'Comptable'               => 'ROLE_COMPTABLE',
                        'Syndic (Administrateur)' => 'ROLE_SYNDIC',
                    ])
            );
    }
}
