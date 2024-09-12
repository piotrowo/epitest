<?php

namespace App\DataFixtures;

use App\Entity\Author;

class AuthorFixtures extends AbstractBaseFixtures
{
    protected function loadData(): void
    {
        $this->createMany(100, 'authors', function ($i) {
            $author = new Author();
            $author->setFirstName($this->faker->firstName);
            $author->setLastName($this->faker->lastName);

            return $author;
        });

        $this->manager->flush();
    }
}
