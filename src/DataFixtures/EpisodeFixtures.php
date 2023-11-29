<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager) : void
    {
        $episode1 = new Episode();
        $episode1->setTitle('Welcome to the Playground');
        $episode1->setNumber(1);
        $episode1->setSynopsis('Synopsis de l\'épisode 1...');
        $episode1->setSeason($this->getReference('season1_Arcane'));
        $manager->persist($episode1);

        $episode2 = new Episode();
        $episode2->setTitle('Titre de l\'épisode 2');
        $episode2->setNumber(2);
        $episode2->setSynopsis('Synopsis de l\'épisode 2...');
        $episode2->setSeason($this->getReference('season1_Arcane'));
        $manager->persist($episode2);

        $episode3 = new Episode();
        $episode3->setTitle('Titre de l\'épisode 3');
        $episode3->setNumber(3);
        $episode3->setSynopsis('Synopsis de l\'épisode 3...');
        $episode3->setSeason($this->getReference('season1_Arcane'));
        $manager->persist($episode3);

  
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }
}
