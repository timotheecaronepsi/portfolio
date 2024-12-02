<?php

namespace App\Controller;

use App\Entity\Stage;
use App\Repository\StageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Attribute\Route;

class StageController extends AbstractController
{
    #[Route('/stage', name: 'app_stage')]
    public function stage(StageRepository $stageRepository): Response
    {
        $stagesSN1 = $stageRepository->findBy(['id' => range(1, 10)]);

        $stagesSN2 = $stageRepository->findBy(['id' => range(11, 20)]);

        return $this->render('stage/stage.html.twig', [
            'stagesSN1' => $stagesSN1,
            'stagesSN2' => $stagesSN2,
        ]);
    }

    #[Route('/stage/{id}', name: 'stage_show')]
    public function showstage(Stage $stage): Response
    {
        return $this->render('stage/show-stage.html.twig', [
            'stage' => $stage,
        ]);
    }

    #[Route('/attestation/consulter/{id}', name: 'app_attestation_consulter')]
    public function consulterAttestation(int $id, StageRepository $stageRepository): Response
    {
        $stage = $stageRepository->find($id);
        $filename = $stage->getAttestation();
        $filePath = $this->getParameter('kernel.project_dir') . '/public/img/stage/' . $filename;

        return $this->file($filePath, $filename, ResponseHeaderBag::DISPOSITION_INLINE);
    }

    #[Route('/attestation/telecharger/{id}', name: 'app_attestation_telecharger')]
    public function telechargerAttestation(int $id, StageRepository $stageRepository): Response
    {
        $stage = $stageRepository->find($id);
        $filename = $stage->getAttestation();
        $filePath = $this->getParameter('kernel.project_dir') . '/public/img/stage/' . $filename;

        return $this->file($filePath, $filename);
    }

}
