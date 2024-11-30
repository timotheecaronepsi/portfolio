<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CertificationController extends AbstractController
{
    #[Route('/certification', name: 'app_certification')]
    public function certification(): Response
    {
        return $this->render('certification/certification.html.twig', [
        ]);
    }
}
