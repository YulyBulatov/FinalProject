<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Source;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Document;
use App\Entity\Checklist;
use App\Entity\Rendezvous;
use App\Entity\Suggestion;
use App\Controller\Admin\UserCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
       
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');

        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('FinalProject');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Article', 'fa fa-newspaper', Article::class);
        yield MenuItem::linkToCrud('Category', 'fa fa-bars', Category::class);
        yield MenuItem::linkToCrud('Checklist', 'fa fa-list-check', Checklist::class);
        yield MenuItem::linkToCrud('Document', 'fa fa-file', Document::class);
        yield MenuItem::linkToCrud('Rendezvous', 'fa fa-handshake', Rendezvous::class);
        yield MenuItem::linkToCrud('Source', 'fa fa-link', Source::class);
        yield MenuItem::linkToCrud('Suggestion', 'fa fa-comment', Suggestion::class);
        yield MenuItem::linkToCrud('User', 'fa fa-user', User::class);


        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
