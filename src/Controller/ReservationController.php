<?php

namespace App\Controller;


use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\OpeningHourRepository;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ReservationController extends AbstractController
{

    /**
     * @throws Exception
     */
    #[Route('/reservation', name: 'app_reservation')]

    public function reservation(Request $request, EntityManagerInterface $entityManager, OpeningHourRepository $openingHourRepository): Response
    {
        $openingHours = $openingHourRepository->getAllOpeningHours();
        $date = new \DateTime();
        $reservation = new Reservation();
        $reservation->setDate($date);
        $user = $this->getUser();
        if($user) {
            $reservation
                ->setGuestEmail($this->getUser()->getEMail())
                ->setFirstName($this->getUser()->getFirstName())
                ->setLastName($this->getUser()->getLastName())
                ->setGuestNumber($this->getUser()->getGuestNumber());
        }

        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->render('reservation/success.html.twig', [
                'reservation' => $reservation
            ]);

        }

            return $this->render('reservation/reservation.html.twig', [
                'controller_name' => 'ReservationController',
                'reservationForm' => $form->createView(),
                'openingHours' => $openingHours
            ]);
        }

        public function getOpeningHoursByDay($day): void
        {
            switch ($day) {
                case '1' :
                    $day = 'Lundi';
                    break;
                case '2' :
                    $day = 'Mardi';
                    break;
                case '3' :
                    $day = 'Mercredi';
                    break;
                case '4' :
                    $day = 'Jeudi';
                    break;
                case '5' :
                    $day = 'Vendredi';
                    break;
                case '6' :
                    $day = 'Samedi';
                    break;
                case '7' :
                    $day = 'Dimanche';
                    break;
            }
        }
}
