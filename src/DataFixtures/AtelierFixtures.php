<?php

namespace App\DataFixtures;

use App\Entity\Atelier;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AtelierFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');
        $users = $manager->getRepository(User::class)->findAll();

        for ($i = 1; $i <= 10; $i++) {
            $atelier = new Atelier();
            $atelier->setNom($faker->sentence)
                ->setDescription("<p>" . join("</p><p>", $faker->paragraphs(3)) . "</p>");
            $atelier->setInstructeur($users[array_rand($users)]);
            $manager->persist($atelier);
        }

        $manager->flush();

    }
    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}
