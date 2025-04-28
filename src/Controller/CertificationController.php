<?php

namespace App\Controller;

use App\Entity\Certification;
use App\Repository\CertificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CertificationController extends AbstractController
{
    #[Route('/certification', name: 'app_certification')]
    public function certification(CertificationRepository $certificationRepository): Response
    {
        $certifications = $certificationRepository->findAll();

        return $this->render('certification/certification.html.twig', ['certifications' => $certifications]);
    }

    #[Route('/certification/{id}', name: 'certification_show')]
    public function showcertification(Certification $certification): Response
    {
        return $this->render('certification/show-certification.html.twig', ['certification' => $certification]);
    }
}
