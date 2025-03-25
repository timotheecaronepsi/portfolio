<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $message = $request->request->get('message');

            if (empty($email) || empty($message)) {
                $this->addFlash('error', 'Veuillez remplir tous les champs.');
            } else {
                $contact = new Contact();
                $contact->setEmail($email);
                $contact->setMessage($message);

                $em->persist($contact);
                $em->flush();

                $this->addFlash('success', 'Votre message a bien été pris en compte.');
            }

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/contact.html.twig');
    }
}
