<?php

namespace App\Controller\Admin;

use App\Entity\Annonce;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AnnonceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Annonce::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Titre'),
            TextEditorField::new('description'),
            IntegerField::new('prix'),
            TextEditorField::new('caracteristiques'),
            TextField::new('contact'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('file')->setBasePath('uploads/annonces')->onlyOnIndex()
        ];
    }

}
