<?php

namespace App\Controller;

use App\Repository\FormulaRepository;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    #[Route('/menu', name: 'app_menu')]
    public function index(MenuRepository $menuRepository, FormulaRepository $formulaRepository): Response
    {
        return $this->render('menu/menu.html.twig', [
            'controller_name' => 'MenuController',
            'menus' => $menuRepository->findMenu(),
            'formulas' => $formulaRepository->findFormula()
        ]);
    }
}
