<?php
namespace App\Controller\Admin;

use App\Entity\Copropriete;
use App\Entity\Incident;
use App\Entity\Lot;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Menu\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(
    routePath: '/demo-admin',
    routeName: 'demo_admin'
)]
class DemoDashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/demo_dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new ()
            ->setTitle('Version Démo – Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil Démo', 'fa fa-home');

        yield MenuItem::section('Copropriété');
        yield MenuItem::linkToCrud('Copropriétés', 'fa fa-building', Copropriete::class);
        yield MenuItem::linkToCrud('Lots', 'fa fa-door-open', Lot::class);

        yield MenuItem::section('Incidents');
        yield MenuItem::linkToCrud('Incidents', 'fa fa-exclamation-triangle', Incident::class);

        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-users', User::class);
    }
}