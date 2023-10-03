<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sonata\AdminBundle\Admin\Pool;
use FOS\RestBundle\View\ViewHandlerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProjectsController extends AbstractController
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
     * @Route("/api/projects", name="apiprojects", methods={"GET"})
    */

    public function getData(): JsonResponse
    {
        $projectsAdmin = $this->adminPool->getAdminByAdminCode('admin.projects');
        $datagrid = $projectsAdmin->getDatagrid();

        $datagrid->buildPager();
        $projects = $datagrid->getResults();
        return $this->json($projects);
    }
}