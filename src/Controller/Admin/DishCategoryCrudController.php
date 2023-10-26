<?php

namespace App\Controller\Admin;

use App\Entity\DishCategory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DishCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DishCategory::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setPageTitle('index', 'Catégories');
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Nom de la catégorie')
            ];
    }
}
