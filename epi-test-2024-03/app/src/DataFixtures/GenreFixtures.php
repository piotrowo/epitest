<?php

namespace App\DataFixtures;

use App\Entity\Genre;

class GenreFixtures extends AbstractBaseFixtures
{
    private readonly array $genreNameList;

    public function __construct()
    {
        /*
         * @source https://www.oprahdaily.com/entertainment/books/a29576863/types-of-book-genres/
         */
        $this->genreNameList = [
            'Action and Adventure',
            'Classics',
            'Comic Book or Graphic Novel',
            'Detective and Mystery',
            'Fantasy',
            'Historical Fiction',
            'Horror',
            'Literary Fiction',
            'Romance',
            'Science Fiction (Sci-Fi)',
            'Short Stories',
            'Suspense and Thrillers',
            'Women\'s Fiction',
            'Biographies and Autobiographies',
            'Cookbooks',
            'Essays',
            'History',
            'Memoir',
            'Poetry',
            'Self-Help',
            'True Crime',
        ];
    }

    protected function loadData(): void
    {
        $this->createMany(count($this->genreNameList), 'genres', function (int $i) {
            $genre = new Genre();
            $genre->setGenre($this->genreNameList[$i]);

            return $genre;
        });

        $this->manager->flush();
    }
}
