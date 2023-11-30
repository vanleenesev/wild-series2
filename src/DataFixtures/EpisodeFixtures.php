<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager) : void
    {
        $faker = Factory::create();

        // Supposons que vous avez 10 saisons
        for ($i = 0; $i < 30; $i++) {
            for ($j = 0; $j < 10; $j++) { // 10 épisodes par saison
                $episode = new Episode();
                $episode->setTitle($faker->sentence);
                $episode->setNumber($j + 1);
                $episode->setSynopsis($faker->paragraph);

                // Assurez-vous que la référence 'season_' . $i existe dans SeasonFixtures
                $episode->setSeason($this->getReference('season_' . $i));
                $manager->persist($episode);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }
}

