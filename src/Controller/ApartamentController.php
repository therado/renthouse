<?php

namespace App\Controller;

use App\Entity\Apartament;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApartamentController extends AbstractController
{

    #[Route('/apartaments', name: 'app_apartaments')]
    public function showAllApartments(EntityManagerInterface $entityManager): Response
    {
        $apartaments = $entityManager->getRepository(Apartament::class)->findAll();
        
        return $this->render('apartament/index.html.twig', [
            'apartaments' => $apartaments,
        ]);
    }

    #[Route('/apartamenty', name: 'app_apartamenty')]
    public function showAll(EntityManagerInterface $entityManager): Response
    {
        $apartments = $entityManager->getRepository(Apartament::class)->findAll();

        return $this->render('apartament/test.html.twig', [
            'apartments' => $apartments,
        ]);
    }
}
