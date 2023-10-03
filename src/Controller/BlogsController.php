<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sonata\AdminBundle\Admin\Pool;
use FOS\RestBundle\View\ViewHandlerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class BlogsController extends AbstractController
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
     * @Route("/api/blogs", name="apiblogs", methods={"GET"})
    */

    public function getData(): JsonResponse
    {
        $blogsAdmin = $this->adminPool->getAdminByAdminCode('admin.blogs');
        $datagrid = $blogsAdmin->getDatagrid();

        $datagrid->buildPager();
        $blogs = $datagrid->getResults();
        return $this->json($blogs);
    }
}