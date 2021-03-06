<?php

namespace App\Controller;

use App\Controller\Base\BaseController;
use App\Entity\Apartment;
use App\Entity\ApartmentReservation;
use App\Form\ApartmentReservationForm;
use App\Manager\ApartmentReservationManager;
use App\Repository\ApartmentReservationRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexController
 *
 * @package App\Controller
 * @Route("/reservation", name="app_apartment_reservation_")
 */
class ApartmentReservationController extends BaseController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/apartment/{apartment}", methods={"GET", "POST"}, name="panel")
     */
    public function panel(
        Apartment $apartment,
        Request $request,
        ApartmentReservationRepository $apartmentReservationRepository,
        ApartmentReservationManager $apartmentReservationManager)
    {
        $reservation = new ApartmentReservation();
        $reservation->setApartment($apartment);

        $form = $this->createForm(ApartmentReservationForm::class, $reservation);

        if ($request->getMethod() === 'POST') {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $reservation->setUser($this->getUser());
                $apartmentReservationManager->calculateReservationPrices($reservation);
                $apartmentReservationManager->save($reservation);

                return new RedirectResponse($this->generateUrl('app_apartment_reservation_summary', [
                    'apartment' => $apartment->getId()
                ]));
            }
        }

        $activeReservations = $apartmentReservationRepository->getApartmentActiveReservations($apartment);

        return $this->render('apartment_reservation/panel.html.twig', [
            'apartment' => $apartment,
            'activeReservations' => $activeReservations,
            'reservationForm' => $form->createView()
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/summary/{apartment}", methods={"GET"}, name="summary")
     */
    public function summary(Apartment $apartment)
    {
        return $this->render('apartment_reservation/summary.html.twig', [
            'apartment' => $apartment,
        ]);
    }

    /**
     * @Route("/calculate_reservation_data/{apartment}", methods={"POST"}, name="calculate_reservation_data", options={"expose":true})
     */
    public function calculateReservationData(Apartment $apartment, Request $request, ApartmentReservationManager $apartmentReservationManager): JsonResponse
    {
        $reservation = new ApartmentReservation();
        $reservation->setApartment($apartment);

        $form = $this->createForm(ApartmentReservationForm::class, $reservation);

        if ($request->getMethod() === 'POST') {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $apartmentReservationManager->calculateApartmentReservationData($reservation);
            } else {
                $reservation->setErrorMessage('Niepełne/nieprawidłowe dane w formularzu');
            }
        }

        return $this->json($reservation->toArray());
    }
}