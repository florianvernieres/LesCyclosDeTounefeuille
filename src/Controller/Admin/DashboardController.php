<?php

namespace App\Controller\Admin;

use App\Entity\Annonce;
use App\Entity\Bureau;
use App\Entity\Projet;
use App\Entity\Sortie;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('les cyclos de Tournefeuille')
            ->setTranslationDomain('admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Annonces', 'fas fa-list', Annonce::class);
        yield MenuItem::linkToCrud('Bureau', 'fas fa-building', Bureau::class);
        yield MenuItem::linkToCrud('Projets', 'fas fa-tasks', Projet::class);
        yield MenuItem::linkToCrud('Sorties', 'fas fa-biking', Sortie::class);
        yield MenuItem::linkToCrud('utilisateurs', 'fas fa-user', User::class);

    }
}
