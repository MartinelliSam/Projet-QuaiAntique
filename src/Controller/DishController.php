<?php

namespace App\Controller;

use App\Entity\Dish;
use App\Repository\DishCategoryRepository;
use App\Repository\DishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DishController extends AbstractController
{
    #[Route('/dish', name: 'app_dish')]
    public function index(DishRepository $dishRepository, DishCategoryRepository $dishCategoryRepository): Response
    {

             return $this->render('dish/dish.html.twig', [
            'controller_name' => 'DishController',
            'dishes' => $dishRepository->findDish(),
            'dishCategories' => $dishCategoryRepository->findCategory()
        ]);
    }


}
