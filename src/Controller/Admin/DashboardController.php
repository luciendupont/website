<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private  AdminUrlGenerator $adminUrlGenerator) 
    {
        
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url=$this->adminUrlGenerator->setController(ProduitCrudController::class) 
        ->generateUrl();

    return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('dashbord');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('e-commerce'); 
        yield MenuItem::section('produit'); 
        yield MenuItem::subMenu('produit','fas fa-bars')->setSubItems([ 
             MenuItem::linkToCrud('ajouter produit', 'fas fa-plus', Produit::class)->setAction(Crud::PAGE_NEW),
             MenuItem::linkToCrud('afficher le produit', 'fas fa-eye', Produit::class)->setAction(Crud::PAGE_NEW)
    ]);
    
 
        yield MenuItem::subMenu('categorie','fas fa-bars')->setSubItems([ 
             MenuItem::linkToCrud('ajouter categorie', 'fas fa-plus', Categorie::class)->setAction(Crud::PAGE_NEW),
             MenuItem::linkToCrud('afficher la categorie', 'fas fa-eye', categorie::class)->setAction(Crud::PAGE_NEW)
    ]);

}
}
