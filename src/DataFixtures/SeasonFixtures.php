<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager) : void
    {
       //Puis ici nous demandons à la Factory de nous fournir un Faker
       $faker = Factory::create();

       /**
       * L'objet $faker que tu récupère est l'outil qui va te permettre 
       * de te générer toutes les données que tu souhaites
       */

       for ($i = 0; $i < 6; $i++) { // Pour chaque programme
        for ($j = 0; $j < 5; $j++) { // Créer 5 saisons par programme
            $season = new Season();
            $season->setNumber($j + 1); // Assurez-vous d'attribuer un numéro
            $season->setYear($faker->year()); // Ajoutez une année
            $season->setDescription($faker->paragraph()); // Ajoutez une description
    
            $season->setProgram($this->getReference('program_' . $i));
            $this->addReference('season_' . ($i * 5 + $j), $season);
            $manager->persist($season);
        }
    }
    

       $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProgramFixtures::class,
        ];
    }
}
