<?php

namespace App\DataFixtures;

use App\Entity\Atelier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AtelierFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 10; $i++) {
            $atelier = new Atelier();
            $atelier->setNom($faker->sentence)
                ->setDescription("<p>" . join("</p><p>", $faker->paragraphs(3)) . "</p>");

            $manager->persist($atelier);
        }

        $manager->flush();

    }
}
