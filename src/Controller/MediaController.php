<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sonata\AdminBundle\Admin\Pool;
use FOS\RestBundle\View\ViewHandlerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class MediaController extends AbstractController
{

    private $adminPool;

    private $viewHandler;

    public function __construct(Pool $adminPool, ViewHandlerInterface $viewHandler)
    {
        $this->adminPool = $adminPool;
        $this->viewHandler = $viewHandler;
    }


    // endpoint that exposes all the data
    /** 
     * @Route("/api/media", name="apimedia", methods={"GET"})
    */

    public function getData(): JsonResponse
    {
        $mediaAdmin = $this->adminPool->getAdminByAdminCode('admin.media');
        $datagrid = $mediaAdmin->getDatagrid();

        $datagrid->buildPager();
        $media = $datagrid->getResults();
        return $this->json($media);
    }
}