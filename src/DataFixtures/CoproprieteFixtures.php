<?php
namespace App\DataFixtures;

use App\Entity\Copropriete;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CoproprieteFixtures extends Fixture
{
    // On crée des constantes pour nos références, c'est plus propre pour ne pas se tromper
    public const COPRO_1_REFERENCE = 'copro-1';
    public const COPRO_2_REFERENCE = 'copro-2';

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // --- Copropriété 1 ---
        $copro1 = new Copropriete();
        $copro1->setNom('Résidence Les Lilas');
        $copro1->setAdresse($faker->streetAddress);
        $copro1->setCodePostal('14000');
        $copro1->setVille('Caen');
        $manager->persist($copro1);

        // On la met en mémoire pour que les autres fichiers puissent la récupérer !
        $this->addReference(self::COPRO_1_REFERENCE, $copro1);

        // --- Copropriété 2 ---
        $copro2 = new Copropriete();
        $copro2->setNom('Le Grand Parc');
        $copro2->setAdresse($faker->streetAddress);
        $copro2->setCodePostal('14123');
        $copro2->setVille('Ifs');
        $manager->persist($copro2);

        $this->addReference(self::COPRO_2_REFERENCE, $copro2);

        $manager->flush();
    }
}
