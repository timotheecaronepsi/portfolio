<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StageController extends AbstractController
{
    #[Route('/stage', name: 'app_stage')]
    public function stage(): Response
    {
        return $this->render('stage/stage.html.twig', [
        ]);
    }
}
