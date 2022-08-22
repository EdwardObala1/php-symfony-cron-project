<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameePageController extends AbstractController
{
    /**
     * @Route("/gamee/page", name="app_gamee_page")
     */
    public function index(): Response
    {
        return $this->render('gamee_page/index.html.twig', [
            'controller_name' => 'GameePageController',
        ]);
    }
}
