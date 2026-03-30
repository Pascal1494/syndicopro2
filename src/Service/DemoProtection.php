<?php
namespace App\Service;

use App\Entity\User;

class DemoProtection
{
    public function isDemoUser(User $user): bool
    {
        return in_array('ROLE_DEMO', $user->getRoles(), true);
    }

    public function denyIfDemo(User $user): void
    {
        if ($this->isDemoUser($user)) {
            throw new \Exception("Ce compte démo ne peut pas être modifié.");
        }
    }
}