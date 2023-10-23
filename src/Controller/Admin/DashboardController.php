<?php

namespace App\Controller\Admin;

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
            ->setTitle('Website');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('e-commerce'); 
        yield MenuItem::section('produit'); 
        yield MenuItem::subMenu('action','fas fa-bars')->setSubItems([]); 

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
