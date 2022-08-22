<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExperiencePageController extends AbstractController
{
    /**
     * @Route("/experience/page", name="app_experience_page")
     */
    public function index(): Response
    {
        return $this->render('experience_page/index.html.twig', [
            'controller_name' => 'ExperiencePageController',
        ]);
    }
}
