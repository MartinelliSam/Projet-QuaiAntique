<?php

namespace App\Controller\Admin;

use App\Entity\Dish;
use App\Entity\DishCategory;
use App\Entity\Formula;
use App\Entity\MaxCapacity;
use App\Entity\Menu;
use App\Entity\OpeningHour;
use App\Entity\Picture;
use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[IsGranted('ROLE_ADMIN')]

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {

    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

//        return parent::index();
        $url = $this->adminUrlGenerator->setController(DishCrudController::class)->generateUrl();

        return $this->redirect($url);
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Le Quai Antique');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Retour au site', 'fas fa-home', 'app_home');
        yield MenuItem::section('Les catégories');
        yield MenuItem::linkToCrud('Ajouter une catégorie', 'fas fa-plus', DishCategory::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Voir les catégorie', 'fa-solid fa-eye', DishCategory::class);
        yield MenuItem::section('La carte');
        yield MenuItem::linkToCrud('Ajouter un plat', 'fas fa-plus', Dish::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Voir les plats', 'fa-solid fa-eye', Dish::class);
        yield MenuItem::section('Les formules');
        yield MenuItem::linkToCrud('Ajouter une formule', 'fas fa-plus', Formula::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Voir les formules', 'fa-solid fa-eye', Formula::class);
        yield MenuItem::section('Les menus');
        yield MenuItem::linkToCrud('Ajouter un menu', 'fas fa-plus', Menu::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Voir les menus', 'fa-solid fa-eye', Menu::class);
        yield MenuItem::section('Les heures d\'ouverture');
        yield MenuItem::linkToCrud('Ajouter une heure d\'ouverture', 'fas fa-plus', OpeningHour::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Voir les heures d\'ouverture', 'fa-solid fa-eye', OpeningHour::class);
        yield MenuItem::section('Galerie d\'images');
        yield MenuItem::linkToCrud('Ajouter une image à la galerie', 'fas fa-plus', Picture::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Voir la galerie d\'image', 'fa-solid fa-eye', Picture::class);
        yield MenuItem::section('Les réservations');
        yield MenuItem::linkToCrud('Voir les réservations', 'fa-solid fa-eye', Reservation::class)->setAction(Crud::PAGE_INDEX);
        yield MenuItem::section('Capacité du restaurant');
        yield MenuItem::linkToCrud('Modifier la capacité du restaurant', 'fa-solid fa-pen-to-square', MaxCapacity::class)->setAction(Crud::PAGE_INDEX);
    }
}