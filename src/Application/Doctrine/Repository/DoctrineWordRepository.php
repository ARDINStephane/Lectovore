<?php

namespace App\Application\Doctrine\Repository;


use App\Application\Doctrine\Entity\DoctrineWord;
use App\Common\Repository\WordRepository;

class DoctrineWordRepository extends DoctrineBaseRepository implements WordRepository
{
    protected $class = DoctrineWord::class;
}