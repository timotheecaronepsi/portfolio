<?php

namespace App\Controller;

use App\Entity\Certification;
use App\Repository\CertificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

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

    #[Route('/certification/consulter/{id}', name: 'app_certification_consulter')]
    public function consulterCertification(int $id, CertificationRepository $certificationRepository): Response
    {
        $certification = $certificationRepository->find($id);
        $filename = $certification->getCertificat();
        $filePath = $this->getParameter('kernel.project_dir') . '/public/img/certification/' . $filename;

        return $this->file($filePath, $filename, ResponseHeaderBag::DISPOSITION_INLINE);
    }

    #[Route('/certification/telecharger/{id}', name: 'app_certification_telecharger')]
    public function telechargerCertification(int $id, CertificationRepository $certificationRepository): Response
    {
        $certification = $certificationRepository->find($id);
        $filename = $certification->getCertificat();
        $filePath = $this->getParameter('kernel.project_dir') . '/public/img/certification/' . $filename;

        return $this->file($filePath, $filename);
    }
}
