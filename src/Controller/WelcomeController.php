<?php

namespace App\Controller;


use App\Repository\ApartamentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        ApartamentRepository $repository,
        AuthorizationCheckerInterface $authChecker
        ): Response
    {

        if (!$authChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_login');
        }

        $apartments = $repository->findAll();
        //array_splice($apartments, 1);

        return $this->render('welcome/index.html.twig', [
            'apartaments' => $apartments,
        ]);
    }

}
