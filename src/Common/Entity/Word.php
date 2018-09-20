<?php

namespace App\Common\Entity;

interface Word
{
    /**
     * @return mixed
     */
    public function getWord();

    /**
     * @param mixed $words
     */
    public function setWord(string $words): void;
}