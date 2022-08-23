<?php

namespace App\Controller;

use Symfony\Bundle\FrameWorkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CronPageController extends AbstractController
{
    /**
     * @Route("/cron", name = "cron")
     */
    public function index(): Response
    {
        return $this -> render('cron/index.html.twig', [
            'controller_name' => "CronPageController"
        ]);
    }
}
?>