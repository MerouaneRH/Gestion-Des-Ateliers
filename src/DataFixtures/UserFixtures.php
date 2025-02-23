<?php

namespace App\DataFixtures;

use App\Entity\Atelier;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Ajout de l'administrateur
        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'admin123'));
        $admin->setNom('Admin');
        $admin->setPrenom('Super');
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        // Ajout de l'instructeur de test
        $user = new User();
        $user->setEmail('toto.titi@gmail.com');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'tototiti'));
        $user->setNom('Toto');
        $user->setPrenom('Titi');
        $user->setRoles(['ROLE_INSTRUCTEUR']);
        $manager->persist($user);

        $manager->flush();

        $faker = Factory::create('fr_FR');
        $users = [];

        for ($i = 1; $i <= 9; $i++) {
            $user = new User();

            $user->setEmail($faker->unique()->email);
            $user->setPassword($this->passwordHasher->hashPassword($user, 'secret'));
            $user->setNom($faker->lastName);
            $user->setPrenom($faker->firstName);
            $user->setRoles(['ROLE_INSTRUCTEUR']);

            $manager->persist($user);
        }

        $manager->flush();

        $ateliers = $manager->getRepository(Atelier::class)->findAll();

        foreach ($users as $user) {
            $inscriptions = $faker->randomElements($ateliers, mt_rand(1, 3));
            foreach ($inscriptions as $atelier) {
                $user->getAteliers()->add($atelier);
                $atelier->ajouterInscrit($user);
            }
        }

        $manager->flush();
    }
}
