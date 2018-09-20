<?php

namespace App\Application\Word\Controller;


use App\Application\Timer\SelectTimerType;
use App\Application\Word\DTO\WrittenWordDTO;
use App\Application\Word\Form\CheckWordType;
use App\Application\Word\WordManager\WordManager;
use App\Common\Controller\BaseController;
use App\Common\Repository\WordRepository;
use Symfony\Component\HttpFoundation\Request;

class WordController extends BaseController
{
    /**
     * @var WordRepository
     */
    private $repository;
    /**
     * @var WordManager
     */
    private $manager;

    public function __construct(
        WordRepository $repository,
        WordManager $manager
    )
    {
        $this->repository = $repository;
        $this->manager = $manager;
    }

    public function randWord (Request $request)
    {
        $writtenWord = new WrittenWordDTO();

        $form = $this->createForm(CheckWordType::class, $writtenWord);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $redWords = $this->manager->getSavedWords();

            if(!empty($redWords[0]) && ($writtenWord->getWrittenWord() === $redWords[0])) {
                $lastWord = $redWords[0];
                $word = $this->manager->provideWord();
                $this->manager->keepWord($word);

                dump(1, $lastWord);
                dump(1, $writtenWord->getWrittenWord());
            } else {
                //Todo gérer les erreurs pour afficher le champ en meme tps que le mot au bout de trois essais
                //Todo mémoriser les results afin de pouvoir les afficher
                $word = $redWords[0];
            }
            unset($writtenWord);
            unset($form);
            $entity = new WrittenWordDTO();
            $form = $this->createForm(CheckWordType::class, $entity);
        } else {
            $word = $this->manager->provideWord();
            $this->manager->keepWord($word);
        }

        return $this->render('Test/test.html.twig', [
            'word' => $word,
            'form' => $form->createView()
        ]);
    }
}