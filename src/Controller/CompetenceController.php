<?php

namespace App\Controller;

use App\Entity\Competence;
use App\Repository\CompetenceRepository;
use App\Repository\CompetenceStageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CompetenceProjetRepository;

class CompetenceController extends AbstractController
{
    #[Route('/competence', name: 'app_competence')]
    public function competence(CompetenceRepository $competenceRepository): Response
    {
        $competences = $competenceRepository->findAll();

        return $this->render('competence/competence.html.twig', ['competences' => $competences]);
    }

    #[Route('/competence/{id}', name: 'competence_show')]
    public function showcompetence(Competence $competence, CompetenceProjetRepository $competenceProjetRepository, CompetenceStageRepository $competenceStageRepository): Response
    {

        $projets = $competenceProjetRepository->findBy(['NCompetence' => $competence]);
        $stages = $competenceStageRepository->findBy(['Ncompetencesstages' => $competence]);

        $totalProjectCount = $competenceProjetRepository->countByTotalProjectsByCompetence($competence->getId());

        return $this->render('competence/show-competence.html.twig', [
            'competence' => $competence,
            'totalProjectCount' => $totalProjectCount,

            'projets' => $projets,
            'stages' => $stages,

        ]);
    }
}
