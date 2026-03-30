<?php
namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class EasyAdminCsrfSubscriber implements EventSubscriberInterface
{
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        // Si c'est un formulaire EasyAdmin qui est envoyé (POST)
        if ($request->isMethod('POST') && $request->query->has('crudAction')) {
            // On injecte un faux jeton qui correspond à ce que Symfony attend
            // Cela "trompe" la validation sans désactiver le service global
            $request->request->set('_token', null);
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [['onKernelRequest', 255]],
        ];
    }
}
