<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = [
        'Action',
        'Adventure',
        'Animation',
        'Fantastique',
        'Horreur',
        'Romance',
        'Science Fiction',
        'Thriller',
        'War',
        'Western',

    ];
        
    public function load(ObjectManager $manager) : void
    {
        foreach (self::CATEGORIES as $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
            $this->addReference('category_' . $categoryName, $category);
        }

        $manager->flush();
    }
}
        