<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProjetController extends AbstractController
{
    #[Route('/projet', name: 'app_projet')]
    public function projet(ProjetRepository $projetRepository): Response
    {
        $projetsSN1 = $projetRepository->findBy(['id' => range(1, 10)]);

        $projetsSN2 = $projetRepository->findBy(['id' => range(11, 20)]);

        return $this->render('projet/projet.html.twig', [
            'projetsSN1' => $projetsSN1,
            'projetsSN2' => $projetsSN2,
        ]);
    }

    #[Route('/projet/{id}', name: 'projet_show')]
    public function showprojet(Projet $projet): Response
    {
        return $this->render('projet/show-projet.html.twig', [
            'projet' => $projet,
        ]);
    }
}
