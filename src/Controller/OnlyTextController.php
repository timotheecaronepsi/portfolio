<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OnlyTextController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function accueil(): Response
    {
        return $this->render('only_text/accueil.html.twig', [
        ]);
    }

    #[Route('/apropos', name: 'app_a_propos')]
    public function apropos(): Response
    {
        return $this->render('only_text/apropos.html.twig', [
        ]);
    }

    #[Route('/mentionslegales', name: 'app_mentions_legales')]
    public function mentionslegales(): Response
    {
        return $this->render('only_text/mentionslegales.html.twig', [
        ]);
    }

    #[Route('/politiqueconfidentialite', name: 'app_politique_confidentialite')]
    public function politiqueconfidentialite(): Response
    {
        return $this->render('only_text/politiqueconfidentialite.html.twig', [
        ]);
    }

}
