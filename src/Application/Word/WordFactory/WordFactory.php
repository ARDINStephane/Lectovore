<?php

namespace App\Application\Word\WordFactory;


use App\Common\Entity\Word;
use App\Common\Repository\WordRepository;

class WordFactory
{
    /**
     * @var WordRepository
     */
    private $wordRepository;

    public function __construct(
        WordRepository $wordRepository
    )
    {
        $this->wordRepository = $wordRepository;
    }

    public function build(string $newWord): Word
    {
        $word = $this->wordRepository->new($newWord);
        $word->setWord($newWord);

        return $word;
    }
}