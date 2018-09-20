<?php

namespace App\Application\Word\DTO;

class WrittenWordDTO
{
    private $writtenWord;

    /**
     * @return mixed
     */
    public function getWrittenWord()
    {
        return $this->writtenWord;
    }

    /**
     * @param mixed $writtenWord
     */
    public function setWrittenWord($writtenWord): void
    {
        $this->writtenWord = $writtenWord;
    }
}