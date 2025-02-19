<?php


namespace App\DataFixtures;

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
        $user = new User();
        $user->setEmail('toto.titi@gmail.com');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'tototiti'));
        $user->setNom('Toto');
        $user->setPrenom('Titi');
        $user->setRoles(['ROLE_INSTRUCTEUR']);
        $manager->persist($user);
        $manager->flush();
        $faker = Factory::create('fr_FR');

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
    }
}