<?php
namespace App\DataFixtures;

use App\Entity\Couleur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CouleurFixtures extends Fixture
{
    public const COULEURS = [
        'Rouge' => '#FF0000',
        'Bleu'  => '#0000FF',
        'Jaune' => '#FFFF00',
        'Vert'  => '#008000',
        'Noir'  => '#000000',
        'Gris'  => '#808080',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::COULEURS as $nom => $hexa) {
            $couleur = new Couleur();
            $couleur->setNom($nom);
            $couleur->setCodeHexa($hexa);
            $manager->persist($couleur);

            // On crée une référence pour chaque couleur (ex: couleur-Rouge)
            $this->addReference('couleur-' . $nom, $couleur);
        }

        $manager->flush();
    }
}
