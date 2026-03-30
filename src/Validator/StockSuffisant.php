<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class StockSuffisant extends Constraint
{
    // Le message qui s'affichera en rouge si le stock est à 0
    public string $message = '⚠️ Action impossible : Le stock de badges pour cette couleur et cette copropriété est épuisé (0).';

    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT; // On applique cette règle sur toute la classe
    }
}
