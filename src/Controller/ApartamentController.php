<?php

namespace App\Controller;

use App\Entity\Apartament;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
