<?php
namespace App\Controller\Admin;

use App\Controller\Admin\CaisseConseilCrudController;
use App\Controller\Admin\IncidentCrudController;
use App\Entity\User;
use App\Repository\BadgeRepository;
use App\Repository\BatimentRepository;
use App\Repository\CaisseConseilRepository;
use App\Repository\CoproprieteRepository;
use App\Repository\IncidentRepository;
use App\Repository\LotRepository;
use App\Repository\PrestataireRepository;
use App\Repository\StockBadgeRepository;
use App\Repository\UserRepository;
use App\Service\CaisseConseilService;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\Asset\Packages;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    private CaisseConseilRepository $repo;

    public function __construct(
        private UserRepository $userRepository,
        private BatimentRepository $batimentRepository,
        private LotRepository $lotRepository,
        private CoproprieteRepository $coproprieteRepository,
        private StockBadgeRepository $stockBadgeRepository,
        private BadgeRepository $badgeRepository,             // ✨ NOUVEAU
        private PrestataireRepository $prestataireRepository, // ✨ NOUVEAU 2 : L'injection
        private IncidentRepository $incidentRepository,
        private AdminUrlGenerator $adminUrlGenerator, // ✨ ON L'AJOUTE ICI      // ✨ NOUVEAU
        private Packages $assetPackages,              // 👈 LE MOT "private" EST OBLIGATOIRE ICI !
        CaisseConseilRepository $repo,
        private CaisseConseilService $caisseService

    ) {
        $this->repo = $repo;
    }

    
    public function index(): Response
    {
        // 1. UTILISATION DU REPOSITORY INJECTÉ (Plus d'erreur de Service Locator)
        $caisse = $this->repo->findOneBy([]);
        $solde  = $caisse ? $caisse->getSolde() : null;

        /** @var User $user */
        $user  = $this->getUser();
        $copro = $user ? $user->getCopropriete() : null;

        // --- LOGIQUE POUR LES INCIDENTS ---
        $qbIncidents = $this->incidentRepository->createQueryBuilder('i')
            ->select('COUNT(i.id)')
            ->where('i.statut = :status')
            ->setParameter('status', 'Nouveau');

        // 🔒 Sécurité : Le Gardien ne voit que les incidents de SA copro
        if (! $this->isGranted('ROLE_SYNDIC') && $copro) {
            $qbIncidents->join('i.declarant', 'u')
                ->andWhere('u.copropriete = :copro')
                ->setParameter('copro', $copro);
        }

        $totalNouveauxIncidents = $qbIncidents->getQuery()->getSingleScalarResult();

        // ✨ On génère l'URL qui pointe vers le CRUD Incident
        $urlIncidents = $this->adminUrlGenerator
            ->setDashboard(DashboardController::class) // 👈 LA SOLUTION EST ICI
            ->setController(IncidentCrudController::class)
            ->generateUrl();

        // --- SI C'EST LE SYNDIC (Il voit tout) ---
        if ($this->isGranted('ROLE_SYNDIC') || ! $copro) {
            $totalUsers        = $this->userRepository->count([]);
            $totalBuildings    = $this->batimentRepository->count([]);
            $totalLots         = $this->lotRepository->count([]);
            $totalCoproprietes = $this->coproprieteRepository->count([]);

            $stocksEnAlerte = $this->stockBadgeRepository->createQueryBuilder('s')
                ->where('s.quantite <= s.seuilAlerte')
                ->getQuery()
                ->getResult();

            // ✨ NOUVEAU : Total Badges actifs (Syndic)
            $totalBadgesActifs = $this->badgeRepository->count(['status' => 'actif']);

            // ✨ NOUVEAU : Les 5 derniers badges (Syndic)
            $derniersBadges = $this->badgeRepository->findBy([], ['id' => 'DESC'], 5);
        }
        // --- SI C'EST LE GARDIEN / CONSEIL SYNDICAL ---
        else {
            $totalUsers     = $this->userRepository->count(['copropriete' => $copro]);
            $totalBuildings = $this->batimentRepository->count(['copropriete' => $copro]);

            $totalLots = $this->lotRepository->createQueryBuilder('l')
                ->select('COUNT(l.id)')
                ->join('l.batiment', 'b')
                ->where('b.copropriete = :copro')
                ->setParameter('copro', $copro)
                ->getQuery()
                ->getSingleScalarResult();

            $totalCoproprietes = 1;

            $stocksEnAlerte = $this->stockBadgeRepository->createQueryBuilder('s')
                ->where('s.quantite <= s.seuilAlerte')
                ->andWhere('s.copropriete = :copro')
                ->setParameter('copro', $copro)
                ->getQuery()
                ->getResult();

            // ✨ NOUVEAU : Total Badges actifs (Filtré par Copro)
            $totalBadgesActifs = $this->badgeRepository->createQueryBuilder('b')
                ->select('COUNT(b.id)')
                ->join('b.lot', 'l')->join('l.batiment', 'bat')
                ->where('bat.copropriete = :copro')
                ->andWhere('b.status = :status')
                ->setParameter('copro', $copro)
                ->setParameter('status', 'actif')
                ->getQuery()
                ->getSingleScalarResult();

            // ✨ NOUVEAU : Les 5 derniers badges (Filtré par Copro)
            $derniersBadges = $this->badgeRepository->createQueryBuilder('b')
                ->join('b.lot', 'l')->join('l.batiment', 'bat')
                ->where('bat.copropriete = :copro')
                ->setParameter('copro', $copro)
                ->orderBy('b.id', 'DESC')
                ->setMaxResults(5)
                ->getQuery()
                ->getResult();

            // ✨ NOUVEAU 3 : On récupère les contacts et prestataires
            $membresCS = $this->userRepository->createQueryBuilder('u')
                ->where('u.copropriete = :copro')
                ->andWhere('u.roles LIKE :role')
                ->setParameter('copro', $copro)
                ->setParameter('role', '%ROLE_CONSEIL_S%')
                ->getQuery()
                ->getResult();

            $syndics = $this->userRepository->createQueryBuilder('u')
                ->where('u.roles LIKE :role')
                ->setParameter('role', '%ROLE_SYNDIC%')
                ->getQuery()
                ->getResult();

            $prestataires = $this->prestataireRepository->createQueryBuilder('p')
                ->join('p.coproprietes', 'c')
                ->where('c = :copro')
                ->setParameter('copro', $copro)
                ->getQuery()
                ->getResult();

            // ✨ NOUVEAU : Le(s) Gardien(s) de CETTE copropriété
            $gardiens = $this->userRepository->createQueryBuilder('u')
                ->where('u.copropriete = :copro')
                ->andWhere('u.roles LIKE :role')
                ->setParameter('copro', $copro)
                ->setParameter('role', '%ROLE_GARDIEN%')
                ->getQuery()
                ->getResult();
        }

        // 2. UN SEUL ET UNIQUE RETURN À LA FIN
        return $this->render('admin/dashboard.html.twig', [
            'soldeCaisse'              => $solde, // 👈 Ajouté ici
            'total_users'              => $totalUsers,
            'total_buildings'          => $totalBuildings,
            'total_lots'               => $totalLots,
            'total_copropriete'        => $totalCoproprietes,
            'alertes_stock'            => $stocksEnAlerte,
            'ma_copro'                 => $copro ? $copro->getNom() : 'Global',
            'total_badges_actifs'      => $totalBadgesActifs,
            'derniers_badges'          => $derniersBadges,

            'membres_cs'               => $membresCS ?? [],
            'syndics'                  => $syndics ?? [],
            'prestataires'             => $prestataires ?? [],
            'gardiens'                 => $gardiens ?? [],

            'url_incidents'            => $urlIncidents,
            'total_nouveaux_incidents' => $totalNouveauxIncidents,
        ]);
    }

    public function configureCrud(): Crud
    {
        return Crud::new ();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');

        /** @var User $user */
        $user  = $this->getUser();
        $copro = $user ? $user->getCopropriete() : null;

        // 2. SECTION GARDIEN / CONSEIL (Filtré pour la copro de l'utilisateur)
        if ($copro && ! $this->isGranted('ROLE_SYNDIC')) {
            yield MenuItem::section($copro->getNom());
            // 👈 Syntaxe EasyAdmin 5 appliquée ici :
            yield MenuItem::linkTo(CoproprieteCrudController::class, 'Ma Copropriété', 'fas fa-building')
                ->setAction('detail')
                ->setEntityId($copro->getId());
            yield MenuItem::linkTo(BatimentCrudController::class, 'Mes Bâtiments', 'fas fa-city');
            yield MenuItem::linkTo(LotCrudController::class, 'Mes Lots', 'fas fa-door-closed');
            yield MenuItem::linkTo(UserCrudController::class, 'Mes Résidents', 'fas fa-users');
        }

        // 3. SECTION PRESTATAIRES
        yield MenuItem::section('Intervenants');
        yield MenuItem::linkTo(PrestataireCrudController::class, 'Prestataires', 'fas fa-truck-moving');

        // 4. SECTION SYNDIC (Gestion Globale - voit TOUT)
        if ($this->isGranted('ROLE_SYNDIC')) {
            yield MenuItem::section('Gestion Globale');
            yield MenuItem::linkTo(CoproprieteCrudController::class, 'Copropriétés', 'fas fa-building');
            yield MenuItem::linkTo(BatimentCrudController::class, 'Bâtiments', 'fas fa-city');
            yield MenuItem::linkTo(LotCrudController::class, 'Lots', 'fas fa-door-closed');
            yield MenuItem::linkTo(UserCrudController::class, 'Utilisateurs', 'fas fa-users');
        }

        yield MenuItem::section('Incidents');
        yield MenuItem::linkTo(IncidentCrudController::class, 'Signalement d\'incident ', 'fas fa-exclamation-triangle');

        // 5. MATÉRIEL
        yield MenuItem::section('Matériel');
        // Tout le monde (Gardien compris) voit les badges assignés
        yield MenuItem::linkTo(BadgeCrudController::class, 'Badges d\'accès', 'fas fa-id-badge');

        // 🔒 SEUL LE PRÉSIDENT (et supérieurs) voit le stock
        if ($this->isGranted('ROLE_CONSEIL_S')) {
            yield MenuItem::linkTo(StockBadgeCrudController::class, 'Stock de Badges', 'fa fa-boxes-stacked');
        }

        yield MenuItem::section('Comptabilité');
        // yield MenuItem::linkTo(BudgetCaisseCrudController::class, 'Budget alloué', 'fas fa-wallet');
        yield MenuItem::linkTo(MenueDepenseCrudController::class, 'Caisse de Dépenses', 'fas fa-receipt')
            ->setPermission('ROLE_CONSEIL_S');
        yield MenuItem::linkTo(CaisseConseilCrudController::class, 'Caisse du Conseil syndical', 'fa fa-piggy-bank');

        // Ajoute ton nouveau module ici
        // ✨ TON NOUVEAU LIEN VERS LES DOCUMENTS
        yield MenuItem::section('Documents de la résidence');
        yield MenuItem::linkTo(DocumentCrudController::class, 'Documents relatifs à la copropriété', 'fas fa-file');

    }

}