<?php
namespace App\Controller;

use App\Service\DemoMode;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DemoController extends AbstractController
{
    #[Route('/demo', name: 'app_demo')]
    public function index(DemoMode $demoMode): Response
    {
        return $this->render('demo/index.html.twig', [
            'is_demo' => $demoMode->isDemo(),
        ]);
    }

    #[Route('/demo/test', name: 'app_demo_test')]
    public function test(DemoMode $demoMode): Response
    {
        dd($demoMode->isDemo());
    }
}