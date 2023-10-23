<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;

class ProduitCrudController extends AbstractCrudController
{
    public const PRODUCTS_BASE_PATH='upload/images/produit';
    public const PRODUCTS_UPLOAD_DIR='public/upload/images/produit'
;    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('nom'),
            TextEditorField::new('description'),
            MoneyField::new('prix')->setCurrency('EUR'),
             BooleanField::new('active'),
             ImageField::new('image')
             ->setBasePath(self::PRODUCTS_BASE_PATH)
             ->setUploadDir(self::PRODUCTS_UPLOAD_DIR),
            DateTimeField::new('updateat')->hideOnForm(),
            DateTimeField::new('createdat')->hideOnForm(),
        ];
    }

}
