<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    #[IsGranted('ROLE_USER')] // Seuls les connectés peuvent voir cette page
    public function index(): Response
    {
        $user = $this->getUser();

        // On récupère tous les lots liés à l'utilisateur
        $lotsPossedes = $user->getLotsPossedes();
        $lotsLoues    = $user->getLotsLoues();

        // On crée une collection unique de tous les lots
        $tousLesLots = [];
        foreach ($lotsPossedes as $l) {$tousLesLots[] = $l;}
        foreach ($lotsLoues as $l) {$tousLesLots[] = $l;}

        return $this->render('dashboard/index.html.twig', [
            'user' => $user,
            'lots' => $tousLesLots,
        ]);
    }
}
