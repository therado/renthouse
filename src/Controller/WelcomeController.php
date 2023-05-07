<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
class WelcomeController extends AbstractController
{
    #[Route('/welcome', name: 'app_welcome')]
    public function index(AuthorizationCheckerInterface $authChecker): Response
    {
        if (!$authChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_login');
        }
    
        return $this->render('welcome/index.html.twig', [
        'controller_name' => 'WelcomeController',
        ]);
    }
    #[Route('/', name: 'app_check')]
    public function move(AuthorizationCheckerInterface $authChecker): Response
    {
        if (!$authChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_login');
        }
    
        return $this->redirectToRoute('app_welcome');
    }
}
