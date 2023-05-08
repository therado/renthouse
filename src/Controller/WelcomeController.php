<?php

namespace App\Controller;

use App\Entity\Apartament;
use App\Controller\ApartamentController;
use App\Repository\ApartamentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
class WelcomeController extends AbstractController
{
    #[Route('/', name: 'app_check')]
    public function move(AuthorizationCheckerInterface $authChecker): Response
    {
        if (!$authChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_login');
        }
    
        return $this->redirectToRoute('app_welcome');
    }




    #[Route('/welcome', name: 'app_welcome')]
    public function index(
        AuthorizationCheckerInterface $authChecker,
        EntityManagerInterface $entityManager,
        ApartamentController $apartamentController
        ): Response
    {

        if (!$authChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_login');
        }

        $apartaments = $apartamentController->showAllApartments($entityManager)->getContent();
        
        return $this->render('welcome/index.html.twig', [
        'controller_name' => 'WelcomeController',
        'apartaments' => $apartaments,
        ]);
    }

    #[Route('/test', name: 'app_check')]
    public function field(ApartamentRepository $apartaments): Response
    {
        return $this->render('welcome/test.html.twig', [
            'apartaments' => $apartaments->findLastFive()
        ]);
    }

    #[Route('/rado', name: 'app_rado')]
    public function rado(ApartamentRepository $repository): Response
    {
        $apartments = $repository->findAll();
        array_splice($apartments, 1);

        return $this->render('welcome/index.html.twig', [
            'apartaments' => $apartments,
        ]);
    }






}
