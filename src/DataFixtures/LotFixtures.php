<?php
namespace App\DataFixtures;

use App\Entity\Batiment;
use App\Entity\Lot;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class LotFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker           = Factory::create('fr_FR');
        $numeroLotGlobal = 1;

        // On prépare des tableaux avec nos utilisateurs pour tirer au sort facilement
        $proprietaires = [];
        $locataires    = [];
        for ($i = 1; $i <= 50; $i++) {
            $proprietaires[] = $this->getReference('proprio-' . $i, User::class);
            $locataires[]    = $this->getReference('locataire-' . $i, User::class);
        }

        // Configuration de la disposition des paliers
        $dispositionPalier = [
            ['porte' => 'Centre', 'type' => 'Studio', 'tantieme' => 150],
            ['porte' => 'Droite', 'type' => 'T3', 'tantieme' => 350],
            ['porte' => 'Gauche', 'type' => 'T4', 'tantieme' => 500],
        ];

        $tousLesBatiments = [];

        // ==========================================
        // 1. On récupère les bâtiments de la Copro 1 (Les Lilas)
        // ==========================================
        for ($i = 1; $i <= 2; $i++) {
            // 🔥 AJOUT DE Batiment::class ICI 👇
            if ($this->hasReference('batiment-copro1-' . $i, Batiment::class)) {
                $tousLesBatiments[] = $this->getReference('batiment-copro1-' . $i, Batiment::class);
            }
        }

        // ==========================================
        // 2. On récupère les bâtiments de la Copro 2 (Le Grand Parc)
        // ==========================================
        for ($i = 1; $i <= 3; $i++) {
            // 🔥 ET ICI 👇
            if ($this->hasReference('batiment-copro2-tour-' . $i, Batiment::class)) {
                $tousLesBatiments[] = $this->getReference('batiment-copro2-tour-' . $i, Batiment::class);
            }
        }

        for ($i = 1; $i <= 7; $i++) {
            // 🔥 ET LÀ 👇
            if ($this->hasReference('batiment-copro2-classique-' . $i, Batiment::class)) {
                $tousLesBatiments[] = $this->getReference('batiment-copro2-classique-' . $i, Batiment::class);
            }
        }

        // ==========================================
        // 3. La grande boucle de création pour TOUS les bâtiments
        // ==========================================
        foreach ($tousLesBatiments as $batiment) {
            $nbEtages = $batiment->getNombreEtage();

            for ($etage = 1; $etage <= $nbEtages; $etage++) {

                foreach ($dispositionPalier as $config) {
                    $appartement = new Lot();
                    $appartement->setNumeroLot('LOT-' . str_pad($numeroLotGlobal++, 4, '0', STR_PAD_LEFT));
                    $appartement->setType('Appartement - ' . $config['type']);
                    $appartement->setEtage($etage);
                    $appartement->setPorte($config['porte']);
                    $appartement->setTantieme($config['tantieme']);
                    $appartement->setBatiment($batiment);

                    $appartement->setProprietaire($faker->randomElement($proprietaires));
                    if ($faker->boolean(70)) {
                        $appartement->setLocataire($faker->randomElement($locataires));
                    }

                    $manager->persist($appartement);

                    if ($faker->boolean(80)) {
                        $cave = new Lot();
                        $cave->setNumeroLot('CAV-' . str_pad($numeroLotGlobal++, 4, '0', STR_PAD_LEFT));
                        $cave->setType('Cave');
                        $cave->setEtage(-1);
                        $cave->setTantieme(10);
                        $cave->setBatiment($batiment);
                        $cave->setProprietaire($appartement->getProprietaire());

                        $cave->setParentLot($appartement);
                        $manager->persist($cave);
                    }
                }
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            BatimentFixtures::class,
            UserFixtures::class,
        ];
    }
}
