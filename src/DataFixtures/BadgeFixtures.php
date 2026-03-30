<?php
namespace App\DataFixtures;

use App\Entity\Badge;
use App\Entity\Couleur;
use App\Entity\Lot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BadgeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // LA NOUVELLE TECHNIQUE : On récupère absolument TOUS les lots d'un coup !
        $lots = $manager->getRepository(Lot::class)->findAll();

        // On récupère les noms des couleurs définies plus haut
        $nomsCouleurs = array_keys(CouleurFixtures::COULEURS);

        foreach ($lots as $lot) {
            // On ne donne des badges d'accès qu'aux appartements (les caves sont liées à l'appart)
            if (str_starts_with($lot->getType(), 'Appartement')) {

                // Ta règle : entre 3 et 12 badges par lot
                $nbBadges = $faker->numberBetween(3, 12);

                for ($i = 0; $i < $nbBadges; $i++) {
                    $badge = new Badge();
                    // Génère un faux code hexadécimal/série du style "AB-1234-CD"
                    $badge->setNumeroHexa(strtoupper($faker->bothify('??-####-??')));
                    $badge->setStatus('Actif');

                    // Une date d'activation dans les 2 dernières années
                    $dateAct = $faker->dateTimeBetween('-2 years', 'now');
                    $badge->setDateActivation(\DateTimeImmutable::createFromMutable($dateAct));
                    $badge->setLot($lot);

                    // --- L'HISTORIQUE (Le petit plus pro !) ---
                    // On simule que 10% des badges sont des remplacements d'un ancien badge
                    if ($faker->boolean(10)) {
                        $ancienBadge = new Badge();
                        $ancienBadge->setNumeroHexa(strtoupper($faker->bothify('??-####-??')));

                        // Raison aléatoire
                        $statutPerte = $faker->randomElement(['Perdu', 'Volé', 'Cassé']);
                        $ancienBadge->setStatus($statutPerte);

                        $dateAncien = $faker->dateTimeBetween('-4 years', '-2 years');
                        $ancienBadge->setDateActivation(\DateTimeImmutable::createFromMutable($dateAncien));
                        $ancienBadge->setLot($lot);
                        $ancienBadge->setMotifRemplacement('Signalé ' . strtolower($statutPerte) . ' par le résident.');

                        // ON FAIT LE LIEN : Le nouveau badge remplace l'ancien !
                        $badge->setRemplaceBadge($ancienBadge);

                        // On sauvegarde l'ancien badge
                        $manager->persist($ancienBadge);
                    }

                    // ON AJOUTE LA COULEUR ALÉATOIRE
                    $nomCouleurAleatoire = $faker->randomElement($nomsCouleurs);
                    $badge->setCouleur($this->getReference('couleur-' . $nomCouleurAleatoire, Couleur::class));

                    // On sauvegarde le nouveau badge
                    $manager->persist($badge);
                }
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        // Ce fichier doit s'exécuter APRES la création des lots !
        return [
            LotFixtures::class,
        ];
    }
}
