<?php

namespace App\Controller\Admin;

use App\Entity\Apartament;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ApartamentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Apartament::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            Field::new('name'),
            Field::new('address'),
            Field::new('description'),
            Field::new('price'),
            Field::new('availability'),
            Field::new('bookableFrom'),
            Field::new('bookableTo'),
        ];
    }

}
