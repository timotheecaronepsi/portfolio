<?php

namespace App\DataFixtures;

use App\Entity\Competence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CompetenceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 6; $i++) {
            $competence = new Competence();
            $competence->setNom($faker->jobTitle)
                       ->setDescription($faker->paragraph)
                       ->setSkills($faker->words(5));

            $manager->persist($competence);
        }

        $manager->flush();
    }
}