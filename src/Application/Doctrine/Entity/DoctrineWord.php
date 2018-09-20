<?php

namespace App\Application\Doctrine\Entity;


use App\Common\Entity\Word;
/**
 * @ORM\Entity(repositoryClass="\App\Application\Doctrine\Repository\DoctrineWordRepository")
 */
class DoctrineWord implements Word
{
    private $word;
    /** @var int $id */
    private $id;

    /**
     * @return mixed
     */
    public function getWord()
    {
        return $this->word;
    }

    /**
     * @param mixed $word
     */
    public function setWord(string $word): void
    {
        $this->word = $word;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}