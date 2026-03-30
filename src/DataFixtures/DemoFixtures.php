<?php
namespace App\DataFixtures;

use App\Entity\Badge;
use App\Entity\Batiment;
use App\Entity\Copropriete;
use App\Entity\Incident;
use App\Entity\Lot;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class DemoFixtures extends Fixture implements FixtureGroupInterface
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {}

    public static function getGroups(): array
    {
        return ['demo'];
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // ─────────────────────────────────────────────
        // COPROPRIÉTÉ
        // ─────────────────────────────────────────────
        $copro = new Copropriete();
        $copro->setNom('Résidence Démo');
        $copro->setAdresse('12 Rue de la Démonstration');
        $copro->setCodePostal('14000');
        $copro->setVille('14000');

        $manager->persist($copro);

        // ─────────────────────────────────────────────
        // 3 BÂTIMENTS (4 à 12 étages)
        // ─────────────────────────────────────────────
        $batiments = [];

        for ($i = 1; $i <= 3; $i++) {
            $bat = new Batiment();
            $bat->setNom("Bâtiment $i");

            $etages = random_int(4, 12);
            $bat->setNombreEtage($etages);

            // Ascenseur si plus de 4 étages
            $bat->setAsAscenceur($etages > 4);

            $bat->setCopropriete($copro);

            $manager->persist($bat);
            $batiments[] = $bat;
        }

        // ─────────────────────────────────────────────
        // UTILISATEURS DÉMO
        // ─────────────────────────────────────────────
        $copro1 = $this->createUser($manager, 'copro1.demo@syndic.fr', 'Copropriétaire', 'Un', 'ROLE_PROPRIETAIRE', $copro);
        $copro2 = $this->createUser($manager, 'copro2.demo@syndic.fr', 'Copropriétaire', 'Deux', 'ROLE_PROPRIETAIRE', $copro);
        $copro3 = $this->createUser($manager, 'copro3.demo@syndic.fr', 'Copropriétaire', 'Trois', 'ROLE_PROPRIETAIRE', $copro);

        $locataire = $this->createUser($manager, 'locataire.demo@syndic.fr', 'Locataire', 'Démo', 'ROLE_LOCATAIRE', $copro);

        // ─────────────────────────────────────────────
        // LOTS
        // ─────────────────────────────────────────────
        $types         = ['Studio', 'T3', 'T4', 'Parking', 'Cave'];
        $proprietaires = [$copro1, $copro2, $copro3];

        $lots = [];

        foreach ($types as $index => $type) {
            $lot = new Lot();
            $lot->setNumeroLot('LOT-' . ($index + 1));
            $lot->setType($type);
            $lot->setEtage(random_int(0, 5));
            $lot->setBatiment($batiments[array_rand($batiments)]);
            $lot->setProprietaire($proprietaires[$index % 3]);

            if ($type === 'Studio') {
                $lot->setLocataire($locataire);
            }

            $manager->persist($lot);
            $lots[] = $lot;
        }

        // ─────────────────────────────────────────────
        // BADGES
        // ─────────────────────────────────────────────
        foreach ($lots as $lot) {
            $nbBadges = random_int(3, 10);

            for ($i = 1; $i <= $nbBadges; $i++) {
                $badge = new Badge();
                $badge->setNumeroHexa(strtoupper($faker->bothify('??-####-??')));
                $dateAct = $faker->dateTimeBetween('-2 years', 'now');
                $badge->setDateActivation(DateTimeImmutable::createFromMutable($dateAct));
                $badge->setStatus('actif');
                $badge->setLot($lot);

                $manager->persist($badge);
            }
        }

        // ─────────────────────────────────────────────
        // INCIDENTS (désactivés)
        // ─────────────────────────────────────────────
        $incident = new Incident();
        $incident->setTitre('Fuite dans les parties communes');
        $incident->setDateCreation(new DateTimeImmutable('-2 days'));
        $incident->setDescription('Une fuite d’eau a été signalée dans les parties communes.');
        $incident->setStatut('En cours');
        $incident->setDeclarant($locataire);
        $incident->setBatiment($batiments[0]);
        $manager->persist($incident);

        $incident2 = new Incident();
        $incident2->setTitre('Problème d’éclairage');
        $incident2->setDateCreation(new DateTimeImmutable('-7 days'));
        $incident2->setDescription('Un problème d’éclairage a été constaté dans le hall.');
        $incident2->setStatut('Résolu');
        $incident2->setDeclarant($copro2);
        $incident2->setBatiment($batiments[1]);
        $manager->persist($incident2);

        $manager->flush();
    }

    private function createUser(ObjectManager $manager, string $email, string $nom, string $prenom, string $role, Copropriete $copro): User
    {
        $u = new User();
        $u->setEmail($email);
        $u->setRoles([$role, 'ROLE_DEMO']);
        $u->setNom($nom);
        $u->setPrenom($prenom);
        $u->setTelephone('06' . random_int(10000000, 99999999));
        $u->setCopropriete($copro);
        $u->setPassword($this->hasher->hashPassword($u, 'demo'));

        $manager->persist($u);
        return $u;
    }
}