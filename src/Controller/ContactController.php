<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Contact;
use App\Form\ContactFormType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function addContact(
        Request $request,
        ContactRepository $contacs
    ): Response {
        $form = $this->createForm(
            ContactFormType::class,
            new Contact()
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $contact->setAuthor($this->getUser());
            $contacs->save($contact, true);

            // Add a flash
            $this->addFlash(
                'success',
                'Twoje zgloszenie zostalo wyslane'
            );

            return $this->redirectToRoute('app_welcome');
            // Redirect
        }

        return $this->renderForm(
            'contact/index.html.twig',
            [
                'form' => $form
            ]
        );
    }
}
