<?php

namespace App\Controller\Admin;

use App\Entity\Dish;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class DishCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dish::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setPageTitle('index', 'Plats');
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('dishCategory', 'Catégorie'),
            TextField::new('title', 'Nom'),
            TextField::new('description'),
            MoneyField::new('price', 'Prix')->setCurrency('EUR')->setCustomOption('storedAsCents', false)
            ];
    }
}
