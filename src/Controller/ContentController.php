<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sonata\AdminBundle\Admin\Pool;
use FOS\RestBundle\View\ViewHandlerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContentController extends AbstractController
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
     * @Route("/api/content", name="apicontent", methods={"GET"})
    */

    public function getData(): JsonResponse
    {
        $contentAdmin = $this->adminPool->getAdminByAdminCode('admin.content');
        $datagrid = $contentAdmin->getDatagrid();

        $datagrid->buildPager();
        $content = $datagrid->getResults();
        return $this->json($content);
    }
}