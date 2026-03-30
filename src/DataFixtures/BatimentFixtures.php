<?php
namespace App\DataFixtures;

use App\Entity\Batiment;
use App\Entity\Copropriete;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface; // Ajout important
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

// <-- Ajoute Faker ici

// On ajoute "implements DependentFixtureInterface" à la classe
class BatimentFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        // On initialise Faker pour l'aléatoire
        $faker = Factory::create('fr_FR');

        // On récupère nos copropriétés créées dans l'autre fichier !
        // $copro1 = $this->getReference(CoproprieteFixtures::COPRO_1_REFERENCE);
        // $copro2 = $this->getReference(CoproprieteFixtures::COPRO_2_REFERENCE);
        $copro1 = $this->getReference(CoproprieteFixtures::COPRO_1_REFERENCE, Copropriete::class);
        $copro2 = $this->getReference(CoproprieteFixtures::COPRO_2_REFERENCE, Copropriete::class);

        // --- Bâtiments de la Copro 1 ---
        // 2 bâtiments de 4 étages
        for ($i = 1; $i <= 2; $i++) {
            $batiment = new Batiment();
            $batiment->setNom("Bâtiment A" . $i);
            $batiment->setNombreEtage(4);
            $batiment->setCopropriete($copro1);

            // TA RÈGLE MÉTIER : 4 étages n'est pas "plus de 4", donc c'est aléatoire
            $batiment->setAsAscenceur($faker->boolean());

            $manager->persist($batiment);

            // On le garde en mémoire pour les futurs lots (ex: batiment-copro1-1)
            $this->addReference('batiment-copro1-' . $i, $batiment);
        }

        // 1 bâtiment de 2 étages
        $batimentC1B3 = new Batiment();
        $batimentC1B3->setNom("Bâtiment B1");
        $batimentC1B3->setNombreEtage(2);
        $batimentC1B3->setCopropriete($copro1);

        // TA RÈGLE MÉTIER : 2 étages, donc aléatoire
        $batimentC1B3->setAsAscenceur($faker->boolean());

        $manager->persist($batimentC1B3);
        $this->addReference('batiment-copro1-3', $batimentC1B3);

        // --- Bâtiments de la Copro 2 ---
        // On fera la boucle des 10 bâtiments de la grosse copropriété ici juste après !

        // --- Bâtiments de la Copro 2 ---

        // 1. Les 3 bâtiments de 12 étages (Ascenseur OBLIGATOIRE car > 4 étages)
        for ($i = 1; $i <= 3; $i++) {
            $batiment = new Batiment();
            $batiment->setNom("Tour " . $i);
            $batiment->setNombreEtage(12);
            $batiment->setCopropriete($copro2);
            $batiment->setAsAscenceur(true); // La règle métier stricte !
            $manager->persist($batiment);

            // On mémorise : batiment-copro2-tour-1, etc.
            $this->addReference('batiment-copro2-tour-' . $i, $batiment);
        }

        // 2. Les 7 bâtiments de 4 étages (Ascenseur aléatoire car <= 4 étages)
        for ($i = 1; $i <= 7; $i++) {
            $batiment = new Batiment();
            $batiment->setNom("Bâtiment Classique " . $i);
            $batiment->setNombreEtage(4);
            $batiment->setCopropriete($copro2);
            $batiment->setAsAscenceur($faker->boolean()); // La règle métier aléatoire !
            $manager->persist($batiment);

            // On mémorise : batiment-copro2-classique-1, etc.
            $this->addReference('batiment-copro2-classique-' . $i, $batiment);
        }

        $manager->flush();
    }

    // Cette fonction est OBLIGATOIRE avec l'interface.
    // Elle dit à Symfony : "Exécute CoproprieteFixtures AVANT moi"
    public function getDependencies(): array
    {
        return [
            CoproprieteFixtures::class,
        ];
    }
}
