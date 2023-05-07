<?php

namespace App\Controller\Admin;

use App\Entity\Apartament;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ApartamentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Apartament::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
