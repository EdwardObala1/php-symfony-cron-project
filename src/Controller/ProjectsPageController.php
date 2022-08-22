<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsPageController extends AbstractController
{
    /**
     * @Route("/projects/page", name="app_projects_page")
     */
    public function index(): Response
    {
        return $this->render('projects_page/index.html.twig', [
            'controller_name' => 'ProjectsPageController',
        ]);
    }
}
