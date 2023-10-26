<?php

namespace App\Controller;

use App\Repository\OpeningHourRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class OpeningHourController extends AbstractController
{

    public function index(EntityManagerInterface $entityManager): void
    {
        $entityManager->getRepository(OpeningHourRepository::class)->findAll();
    }

}
