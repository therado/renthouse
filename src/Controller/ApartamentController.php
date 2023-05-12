<?php

namespace App\Controller;

use App\Entity\Apartament;
use App\Form\ApartamentFormType;
use App\Repository\ApartamentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApartamentController extends AbstractController
{

    #[Route('/apartments', name: 'app_apartments')]
    public function showAllApartments(EntityManagerInterface $entityManager): Response
    {
        $apartaments = $entityManager->getRepository(Apartament::class)->findAll();
        
        return $this->render('apartament/index.html.twig', [
            'apartaments' => $apartaments,
        ]);
    }

    #[Route('/apartament/{name}', name: 'app_apartament')]
    public function showApartament(
        string $name,
        EntityManagerInterface $entityManager
    ): Response {
        $apartament = $entityManager
            ->getRepository(Apartament::class)
            ->findOneBy(['name' => $name]);
        
        // Jeśli apartament o podanej nazwie nie istnieje, zwracamy odpowiedź 404
        if (!$apartament) {
            throw $this->createNotFoundException('Apartament not found');
        }

        return $this->render('apartament/index.html.twig', [
            'apartament' => $apartament,
        ]);
    }

    #[Route('/create/apartament', name: 'app_create_apartament')]
    public function add(
        Request $request,
        ApartamentRepository $apartaments
    ): Response {
        $form = $this->createForm(ApartamentFormType::class, new Apartament());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $apartament = $form->getData();
            //$apartament->setAuthor($this->getUser());
            $apartaments->save($apartament, true);

            // Add a flash
            $this->addFlash(
                'success',
                'Your apartment have been added.'
            );

            return $this->redirectToRoute('app_welcome');
            // Redirect
        }

        return $this->renderForm(
            'apartament/create.html.twig',
            [
                'form' => $form
            ]
        );
    }
    #[Route('/test', name: 'test')]
    public function test(): Response
    {
        return $this->render('apartament/test.html.twig');
    }
}
