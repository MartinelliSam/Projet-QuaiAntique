<?php

namespace App\Controller\Admin;

use App\Entity\OpeningHour;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use Symfony\Component\Validator\Constraints\Time;

class OpeningHourCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpeningHour::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setPageTitle('index', 'Heures d\'ouverture');
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('day', 'Jour'),
            IntegerField::new('noonOpeningHour', 'Heure d\'ouverture du midi'),
            IntegerField::new('noonClosingHour', 'Heure de fermeture du midi'),
            IntegerField::new('eveningOpeningHour', 'Heure d\'ouverture du soir'),
            IntegerField::new('eveningClosingHour', 'Heure de fermeture du soir'),
        ];
    }

}
