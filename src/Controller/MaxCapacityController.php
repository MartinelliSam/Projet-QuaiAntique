<?php

namespace App\Controller;

use App\Repository\MaxCapacityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MaxCapacityController extends AbstractController
{
    public function index(EntityManagerInterface $entityManager): void
    {
      $entityManager->getRepository(MaxCapacityRepository::class)->findAll();
    }
}
