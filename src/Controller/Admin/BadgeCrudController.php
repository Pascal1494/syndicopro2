<?php
namespace App\Controller\Admin;

use App\Controller\Admin\Trait\CoproprieteSecuriteTrait;
use App\Entity\Badge;
use App\Entity\StockBadge;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class BadgeCrudController extends AbstractCrudController
{
    use CoproprieteSecuriteTrait;

    public function __construct(
        private MailerInterface $mailer,
        private AdminUrlGenerator $adminUrlGenerator,
        private RequestStack $requestStack,
        private EntityManagerInterface $entityManager
    ) {}

    public static function getEntityFqcn(): string
    {
        return Badge::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des Badges d\'accès')
            ->setDefaultSort(['id' => 'DESC'])
            ->setSearchFields([
                'numeroHexa',
                'lot.batiment.copropriete.nom',
            ])
            // ✨ NOUVEAU : On surcharge le template de la liste (index)
            ->overrideTemplate('crud/index', 'admin/badge_index.html.twig');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new ('numeroHexa', 'N° Hexadécimal'),

            ChoiceField::new ('status', 'Statut')->setChoices([
                'Actif'   => 'actif',
                'Inactif' => 'inactif',
                'Perdu'   => 'perdu',
                'Vol'     => 'Vol',
            ])

                ->renderAsBadges([
                    'nouveau'  => 'success', // Bleu clair
                    'actif'    => 'success', // Vert
                    'inactif'  => 'danger',  // Gris
                    'perdu'    => 'danger',  // Rouge
                    'volé'     => 'danger', // Rouge
                    'cassé'    => 'danger', // Orange / Jaune
                    'remplacé' => 'danger',
                ]),

            DateTimeField::new ('dateActivation', 'Date d\'activation')
                ->setFormat('dd/MM/yyyy HH:mm'),

            // ✨ CORRECTION ICI : "entity" c'est le Lot. On cherche la copro du Bâtiment ("b").
            AssociationField::new ('lot', 'Lot rattaché')
                ->setQueryBuilder(function (QueryBuilder $qb) {
                    if ($this->isGranted('ROLE_SYNDIC')) {
                        return $qb;
                    }
                    $user = $this->getUser();
                    if ($user && $user->getCopropriete()) {
                        return $qb->join('entity.batiment', 'b')
                            ->andWhere('b.copropriete = :macopro') // 👈 C'est b.copropriete !
                            ->setParameter('macopro', $user->getCopropriete());
                    }
                    return $qb->andWhere('1 = 0');
                }),

            AssociationField::new ('couleur', 'Couleur du badge'),

            ChoiceField::new ('motifRemplacement', 'Motif du remplacement')->setChoices([
                'Nouveau'  => 'nouveau',
                'Perdu'    => 'perdu',
                'Volé'     => 'volé',
                'Cassé'    => 'cassé',
                'Remplacé' => 'remplacé',
            ])->hideOnIndex()
                ->renderAsBadges([
                    'nouveau'  => 'success',  // Bleu clair
                    'perdu'    => 'danger',   // Rouge
                    'volé'     => 'danger',  // Rouge
                    'cassé'    => 'warning', // Orange / Jaune
                    'remplacé' => 'light',
                ]),

            // ✨ CORRECTION ICI : "entity" c'est le Badge. Badge -> Lot -> Bâtiment -> Copropriété.
            AssociationField::new ('remplacebadge', 'Ancien badge remplacé')
                ->hideOnIndex()
                ->setQueryBuilder(function (QueryBuilder $qb) {
                    if ($this->isGranted('ROLE_SYNDIC')) {
                        return $qb;
                    }
                    $user = $this->getUser();
                    if ($user && $user->getCopropriete()) {
                        return $qb->join('entity.lot', 'l')
                            ->join('l.batiment', 'b')
                            ->andWhere('b.copropriete = :macopro') // 👈 C'est b.copropriete !
                            ->setParameter('macopro', $user->getCopropriete());
                    }
                    return $qb->andWhere('1 = 0');
                }),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(ChoiceFilter::new ('status', 'Statut du badge')->setChoices([
                'Actif'   => 'actif',
                'Inactif' => 'inactif',
                'Perdu'   => 'perdu',
            ]))
            ->add(EntityFilter::new ('couleur', 'Couleur du badge'))
            ->add(EntityFilter::new ('lot', 'Lot / Copropriété'))
            ->add(TextFilter::new ('numeroHexa', 'Numéro Hexadécimal'));
    }

    // ✨ CORRECTION ICI : Badge -> Lot -> Bâtiment -> Copropriété.
    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);

        if ($this->isGranted('ROLE_SYNDIC')) {
            return $qb;
        }

        $user = $this->getUser();
        if ($user && $user->getCopropriete()) {
            $qb->join('entity.lot', 'l')
                ->join('l.batiment', 'b')
                ->andWhere('b.copropriete = :macopro') // 👈 C'est b.copropriete !
                ->setParameter('macopro', $user->getCopropriete());
        } else {
            $qb->andWhere('1 = 0');
        }

        return $qb;
    }

    public function configureActions(Actions $actions): Actions
    {
        $remplacer = Action::new ('remplacer', 'Remplacer', 'fa fa-exchange-alt')
            ->linkToUrl(function (Badge $badge) {
                return $this->adminUrlGenerator
                    ->setController(self::class)
                    ->setAction(Action::NEW )
                    ->set('remplace_id', $badge->getId())
                    ->generateUrl();
            });

        $actions->add(Crud::PAGE_INDEX, Action::DETAIL);

        if ($this->isGranted('ROLE_CONSEIL_S')) {
            $actions
                ->add(Crud::PAGE_INDEX, $remplacer)
                ->add(Crud::PAGE_DETAIL, $remplacer);
        } else {
            $actions->disable(Action::NEW , Action::EDIT, Action::DELETE);
        }

        return $actions;
    }

    public function createEntity(string $entityFqcn): object
    {
        $nouveauBadge = new Badge();

        $request    = $this->requestStack->getCurrentRequest();
        $remplaceId = $request->query->get('remplace_id');

        if ($remplaceId) {
            $ancienBadge = $this->entityManager->getRepository(Badge::class)->find($remplaceId);

            if ($ancienBadge) {
                $nouveauBadge->setRemplacebadge($ancienBadge);
                $nouveauBadge->setLot($ancienBadge->getLot());
                $nouveauBadge->setCouleur($ancienBadge->getCouleur());
            }
        }

        return $nouveauBadge;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (! $entityInstance instanceof Badge) {
            return;
        }

        $couleur = $entityInstance->getCouleur();
        $lot     = $entityInstance->getLot();

        if ($couleur && $lot && $lot->getBatiment() && $lot->getBatiment()->getCopropriete()) {
            $copropriete = $lot->getBatiment()->getCopropriete();

            $stock = $entityManager->getRepository(StockBadge::class)->findOneBy([
                'couleur'     => $couleur,
                'copropriete' => $copropriete,
            ]);

            if ($stock && $stock->getQuantite() > 0) {
                $stock->setQuantite($stock->getQuantite() - 1);
                $entityManager->persist($stock);

                if ($stock->getQuantite() == $stock->getSeuilAlerte()) {
                    $email = (new Email())
                        ->from('alerte-stock@syndicpro.com')
                        ->to('syndic@test.com')
                        ->subject('⚠️ Alerte Stock de Badges : ' . $copropriete)
                        ->text(sprintf(
                            "Bonjour,\n\nLe stock de badges vierges (Couleur : %s) pour la copropriété %s a atteint son seuil critique.\nIl ne reste plus que %d badge(s).\n\nPensez à en recommander rapidement !",
                            $couleur,
                            $copropriete,
                            $stock->getQuantite()
                        ));

                    $this->mailer->send($email);
                }
            }
        }

        $ancienBadge = $entityInstance->getRemplacebadge();

        if ($ancienBadge) {
            $motif = $entityInstance->getMotifRemplacement();

            if ($motif === 'Perte' || $motif === 'Vol') {
                $ancienBadge->setStatus('perdu');
            } else {
                $ancienBadge->setStatus('inactif');
            }

            $ancienBadge->setDateRemplacement(new \DateTimeImmutable());
            $entityManager->persist($ancienBadge);
        }

        parent::persistEntity($entityManager, $entityInstance);
    }
}
