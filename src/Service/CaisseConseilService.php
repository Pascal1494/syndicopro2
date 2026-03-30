<?php
namespace App\Service;

use App\Repository\CaisseConseilRepository;

class CaisseConseilService
{
    public function __construct(private CaisseConseilRepository $repo)
    {
    }

    public function getSolde(): ?float
    {
        $caisse = $this->repo->findOneBy([]);

        return $caisse ? $caisse->getSolde() : null;
    }
}