<?php
namespace App\Service;

class DemoMode
{
    public function isDemo(): bool
    {
        return $_ENV['APP_DEMO'] === 'true';
    }

    public function limitReached(int $current, int $max): bool
    {
        return $this->isDemo() && $current >= $max;
    }
}