<?php

namespace App\Controller;

use App\Entity\Competence;
use App\Repository\CompetenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompetenceController extends AbstractController
{
    #[Route('/competence', name: 'app_competence')]
    public function competence(CompetenceRepository $competenceRepository): Response
    {
        $competences = $competenceRepository->findAll();

        return $this->render('competence/competence.html.twig', [
            'competences' => $competences,
        ]);
    }

    #[Route('/competence/{id}', name: 'competence_show')]
    public function showcompetence(Competence $competence): Response
    {
        return $this->render('competence/show-competence.html.twig', [
            'competence' => $competence,
        ]);
    }
}
