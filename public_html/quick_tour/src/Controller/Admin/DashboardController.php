<?php

namespace App\Controller\Admin;

use App\Entity\Equipe;
use App\Entity\Evenement;
use App\Entity\Joueur;
use App\Entity\Tournoi;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Quick Tour');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Tournois', 'fa fa-tournoi', Tournoi::class);
        yield MenuItem::linkToCrud('Evenements', 'fa fas-Event', Evenement::class);
        yield MenuItem::linkToCrud('Equipe', 'fa fas-Team List', Equipe::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fas-User List', User::class);
        yield MenuItem::linkToCrud('Joueurs', 'fa fas-Player List', Joueur::class);

    }
}
