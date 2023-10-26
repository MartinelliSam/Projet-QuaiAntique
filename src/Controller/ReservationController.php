<?php

namespace App\Controller;


use App\Entity\OpeningHour;
use App\Entity\Reservation;
use App\Form\ReservationType;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ReservationController extends AbstractController
{

    #[Route('/reservation', name: 'app_reservation')]

    public function reservation(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservation = new Reservation();
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
            ]);


        }

    /**
     * @throws Exception
     */
    #[Route('/reservation/date', name: 'app_reservation_hours')]
    public function hours(Request $request, EntityManagerInterface $entityManager): Response
    {
        $date = $request->query->get('date');
        $selectedDate = new \DateTime($date);
        $formatter = new \IntlDateFormatter('fr_FR', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
        $formatter->setPattern('EEEE');
        $weekDay = ucfirst($formatter->format($selectedDate));
        // Récupérez les heures d'ouverture pour ce jour de la semaine à partir de la base de données
        $hours = $entityManager->getRepository(OpeningHour::class)->findOneBy(['day' => $weekDay]);
        $openingHours = [

                'noonOpening' => $hours->getNoonOpeningHour(),
                'noonClosing' => $hours->getNoonClosingHour(),
                'eveningOpening' => $hours->getEveningOpeningHour(),
                'eveningClosing' => $hours->getEveningClosingHour()
        ];

        $reservationHours = [];

        for($openingHours['noonOpening']; $openingHours['noonOpening'] < $openingHours['noonClosing']; $openingHours['noonOpening']++) {
            $reservationHours[] = $openingHours['noonOpening'];
        }

        for($openingHours['eveningOpening']; $openingHours['eveningOpening'] < $openingHours['eveningClosing']; $openingHours['eveningOpening']++) {
            $reservationHours[] = $openingHours['eveningOpening'];
        }

        return new JsonResponse($reservationHours);

    }

}
