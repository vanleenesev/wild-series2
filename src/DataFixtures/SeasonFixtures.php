<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager) : void
    {
        $season1 = new Season();
        $season1->setNumber(1);
        $season1->setDescription('La première saison de Arcane.');
        $season1->setProgram($this->getReference('program_Arcane'));

        $manager->persist($season1);

        $this->addReference('season1_Arcane', $season1);


        // Répétez le processus pour d'autres saisons si nécessaire

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProgramFixtures::class,
        ];
    }
}
