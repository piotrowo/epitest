<?php

namespace App\DataFixtures;

use App\Entity\Publisher;

class PublisherFixtures extends AbstractBaseFixtures
{
    protected function loadData(): void
    {
        $this->createMany(20, 'publishers', function ($i) {
            $publisher = new Publisher();
            $publisher->setName($this->faker->company());

            return $publisher;
        });

        $this->manager->flush();
    }
}
