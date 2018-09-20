<?php

namespace App\Application\Results\Controller;


use App\Common\Controller\BaseController;

class ResultController extends BaseController
{
    public function showResults()
    {
        $yes = 'yes';

        return $this->render('Results/results.html.twig', [
            'yes' => $yes
        ]);
    }
}