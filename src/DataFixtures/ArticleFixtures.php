<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($x = 1; $x <= 10; $x++){
            $article = new Article(); // Start of (step 1/3)
            $article->setTitle("Titre de l'article #$x")
                    ->setContent("<p>Contenu de of articles #$x</p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreatedAt(new \DateTime()); // End of (step 1/3)
            $manager->persist($article); // Make the new article persistent (step 2/3)
        }
        $manager->flush(); // Execute SQL and actually put the articles in the DB (step 3/3)
    }
}
