<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Attribute\Route;

class OnlyTextController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function accueil(): Response
    {
        return $this->render('only_text/accueil.html.twig', [
        ]);
    }

    #[Route('/presentation', name: 'app_presentation')]
    public function presentation(): Response
    {
        return $this->render('only_text/presentation.html.twig', [
        ]);
    }

    #[Route('/cv/consulter', name: 'app_cv_consulter')]
    public function consulterCv(): Response
    {
        $filePath = $this->getParameter('kernel.project_dir') . '/public/cv/cv.pdf';

        return $this->file($filePath, 'CV_Timothee_Caron.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }

    #[Route('/cv/telecharger', name: 'app_cv_telecharger')]
    public function telechargerCv(): Response
    {
        $filePath = $this->getParameter('kernel.project_dir') . '/public/cv/cv.pdf';

        return $this->file($filePath, 'CV_Timothee_Caron.pdf');
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
