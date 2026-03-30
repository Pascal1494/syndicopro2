<?php
namespace App\DataFixtures;

use App\DataFixtures\CoproprieteFixtures;
use App\Entity\Copropriete;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface; // <-- AJOUTER ÇA
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface// <-- AJOUTER L'INTERFACE

{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Récupération des références de Copropriétés
        $copro1 = $this->getReference(CoproprieteFixtures::COPRO_1_REFERENCE, Copropriete::class);
        $copro2 = $this->getReference(CoproprieteFixtures::COPRO_2_REFERENCE, \App\Entity\Copropriete::class);

        // 1. Création d'un compte Syndic (Lui n'a pas forcément de copro rattachée car il gère tout)
        $syndic = new User();
        $syndic->setEmail('admin@syndic.fr');
        $syndic->setRoles(['ROLE_SYNDIC']);
        $syndic->setNom('Dupont');
        $syndic->setPrenom('Jean');
        $syndic->setPassword($this->hasher->hashPassword($syndic, 'password'));
        $manager->persist($syndic);

        // // 1bis . Création ducompteSyndicDémo;
        // $demo = new User();
        // $demo->setEmail('demo@demo.fr');
        // $demo->setRoles(['ROLE_SYNDIC', 'ROLE_DEMO']); // accès admin + limitations démo
        // $demo->setNom('Démo');
        // $demo->setPrenom('Syndic');
        // $demo->setPassword($this->hasher->hashPassword($demo, 'demo'));
        // $manager->persist($demo);

        // Optionnel : référence si besoin
        // $this->addReference('user-demo', $demo);

        // 1ter. Création du compte Président du Conseil Syndical Démo
        $demoPresident = new User();
        $demoPresident->setEmail('president.demo@syndic.fr');
        $demoPresident->setRoles(['ROLE_PRESIDENT', 'ROLE_DEMO']);
        $demoPresident->setNom('Président');
        $demoPresident->setPrenom('Démo');
        $demoPresident->setCopropriete($copro1); // il doit être rattaché à une copro
        $demoPresident->setPassword($this->hasher->hashPassword($demoPresident, 'demo'));
        $manager->persist($demoPresident);

        $this->addReference('user-demo-president', $demoPresident);

        // // 1quater. Création du compte Copropriétaire Démo
        // $demoCopro = new User();
        // $demoCopro->setEmail('copro.demo@syndic.fr');
        // $demoCopro->setRoles(['ROLE_PROPRIETAIRE', 'ROLE_DEMO']);
        // $demoCopro->setNom('Copropriétaire');
        // $demoCopro->setPrenom('Démo');
        // $demoCopro->setCopropriete($copro1);
        // $demoCopro->setTelephone($faker->phoneNumber());
        // $demoCopro->setPassword($this->hasher->hashPassword($demoCopro, 'demo'));
        // $manager->persist($demoCopro);

        // $this->addReference('user-demo-copro', $demoCopro);

        // 2. Création du Gardien (On le lie à la Copropriété 1 par exemple)
        $gardien = new User();
        $gardien->setEmail('gardien@syndic.fr');
        $gardien->setRoles(['ROLE_GARDIEN']);
        $gardien->setCopropriete($copro1); // 🏠 LIAISON ICI !
        $gardien->setNom($faker->lastName());
        $gardien->setPrenom($faker->firstName());
        $gardien->setTelephone($faker->phoneNumber());
        $gardien->setHorairesGardien('Du lundi au vendredi, 8h-12h / 14h-18h');
        $gardien->setPassword($this->hasher->hashPassword($gardien, 'password'));
        $manager->persist($gardien);

        // 3. Création de 50 Propriétaires (On en met la moitié dans chaque copro)
        for ($i = 1; $i <= 50; $i++) {
            $proprio = new User();
            $proprio->setEmail($faker->unique()->email());
            $proprio->setRoles(['ROLE_PROPRIETAIRE']);
            $proprio->setNom($faker->lastName());
            $proprio->setPrenom($faker->firstName());
            $proprio->setTelephone($faker->phoneNumber());
            $proprio->setPassword($this->hasher->hashPassword($proprio, 'password'));

            // On répartit : les 25 premiers en copro 1, les autres en copro 2
            $proprio->setCopropriete($i <= 15 ? $copro1 : $copro2);

            $manager->persist($proprio);
            $this->addReference('proprio-' . $i, $proprio);
        }

        // 4. Création de 50 Locataires (Même logique de répartition)
        for ($i = 1; $i <= 50; $i++) {
            $locataire = new User();
            $locataire->setEmail($faker->unique()->email());
            $locataire->setRoles(['ROLE_LOCATAIRE']);
            $locataire->setNom($faker->lastName());
            $locataire->setPrenom($faker->firstName());
            $locataire->setTelephone($faker->phoneNumber());
            $locataire->setPassword($this->hasher->hashPassword($locataire, 'password'));

            $locataire->setCopropriete($i <= 15 ? $copro1 : $copro2);

            $manager->persist($locataire);
            $this->addReference('locataire-' . $i, $locataire);
        }

        $manager->flush();
    }

    // 🔥 C'EST ÇA QUI COMMANDE L'ORDRE !
    public function getDependencies(): array
    {
        return [
            CoproprieteFixtures::class,
        ];
    }
}