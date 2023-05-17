<?php

namespace App\Controller;


use App\Entity\Apartment;
use App\Entity\Reservation;
use App\Form\ApartmentFormType;
use App\Form\ReservationFormType;
use App\Repository\ApartmentRepository;
use App\Repository\ReservationRepository;
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
        $apartaments = $entityManager->getRepository(Apartment::class)->findAll();
        
        return $this->render('apartament/index.html.twig', [
            'apartaments' => $apartaments,
        ]);
    }

    #[Route('/apartment/{name}', name: 'app_apartament')]
    public function showApartament(
        string $name,
        EntityManagerInterface $entityManager
    ): Response {
        $apartament = $entityManager
            ->getRepository(Apartment::class)
            ->findOneBy(['name' => $name]);
        
        // Jeśli apartament o podanej nazwie nie istnieje, zwracamy odpowiedź 404
        if (!$apartament) {
            throw $this->createNotFoundException('Apartament not found');
        }

        return $this->render('apartament/index.html.twig', [
            'apartament' => $apartament,
        ]);
    }

    #[Route('/apartment/{name}/reservation', name: 'app_apartment_reservation')]
public function addReservation(
    Apartment $apartment,
    Request $request,
    EntityManagerInterface $entityManager,
    ReservationRepository $reservations
): Response {
    $form = $this->createForm(ReservationFormType::class, new Reservation());
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $reservation = $form->getData();
        $reservation->setApartmentReservation($apartment);
        $reservation->setClientAccount($this->getUser());
        $entityManager->persist($reservation); // Dodaj rezerwację do menadżera encji
        $entityManager->flush(); // Zapisz rezerwację w bazie danych
        // Add a flash message
        $this->addFlash(
            'success',
            'Rezerwacja została dokonana.'
        );
        return $this->redirectToRoute('app_welcome');
    }

    return $this->renderForm(
        'apartament/create.html.twig',
        [
            'form' => $form->createView(),
            'apartment' => $apartment,
        ]
    );
}

    #[Route('/create/apartment', name: 'app_create_apartament')]
    public function add(
        Request $request,
        ApartmentRepository $apartaments
    ): Response {
        $form = $this->createForm(ApartmentFormType::class, new Apartment());
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
