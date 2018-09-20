<?php

namespace App\Application\Word\WordManager;

use App\Common\Entity\Word;
use App\Common\Repository\WordRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class WordManager
{
    /**
     * @var SessionInterface
     */
    private $session;
    /**
     * @var WordRepository
     */
    private $repository;

    public function __construct(
        SessionInterface $session,
        WordRepository $repository
    ) {
        $this->session = $session;
        $session->start();
        $this->repository = $repository;
    }

    public function keepWord(string $word)
    {
        $redWords = $this->getSavedWords();
        if ($redWords) {
            array_unshift($redWords, $word);
            $this->session->set('redWords', $redWords);

        } else {
            $redWords = [];
            array_unshift($redWords, $word);
            $this->session->set('redWords', $redWords);
        }

    }

    public function getSavedWords(): ?array
    {
        !empty($this->session->get('redWords')) ? $redWords = $this->session->get('redWords') : $redWords = null;

        return $redWords;
    }

    public function provideWord(): string
    {
        $words = $this->repository->findAll();
        $key = array_rand($words, 1);
        $word = $words[$key]->getWord();
        $this->session->set('lastWord', $word);

        return $word;
    }

    public function getLastWord(): string
    {
        $lastWord = $this->session->get('lastWord');

        return $lastWord;
    }
}