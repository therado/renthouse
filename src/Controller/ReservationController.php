<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class ReservationController extends AbstractController
{
    #[Route('/apartament/{name}', name: 'app_apartament_reservation')]
    public function showReservationForm(
        string $name,
        EntityManagerInterface $entityManager,
        Request $request
    ): Response {
        $apartament = $entityManager
            ->getRepository(Apartament::class)
            ->findOneBy(['name' => $name]);
        
        // Jeśli apartament o podanej nazwie nie istnieje, zwracamy odpowiedź 404
        if (!$apartament) {
            throw $this->createNotFoundException('Apartament nie istenieje lub cos sie rozjebalo');
        }

        $form = $this->createForm(ReservationFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservationData = $form->getData();
            // przekazanie danych rezerwacji do np. systemu płatności
            $this->addFlash(
                'success',
                'Reservation done.'
            );

            return $this->redirectToRoute('app_welcome');
        }

        return $this->render('reservation/index.html.twig', [
            'apartament' => $apartament,
            'form' => $form->createView(),
        ]);
    }
}