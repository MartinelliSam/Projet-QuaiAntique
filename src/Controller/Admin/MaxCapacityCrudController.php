<?php

namespace App\Controller\Admin;

use App\Entity\MaxCapacity;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class MaxCapacityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MaxCapacity::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setPageTitle('index', 'Capacité du restaurant');
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('total', 'Capacité maximum du restaurant')
        ];
    }
}
