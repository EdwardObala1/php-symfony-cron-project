<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sonata\AdminBundle\Admin\Pool;
use FOS\RestBundle\View\ViewHandlerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class APIJsonController extends AbstractController
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
     * @Route("/api/homepage", name="apihomepage", methods={"GET"})
    */

    public function homePageData(): JsonResponse
    {
        $experienceAdmin = $this->adminPool->getAdminByAdminCode('admin.experiences');
        $projectsAdmin = $this->adminPool->getAdminByAdminCode('admin.projects');
        $contentAdmin = $this->adminPool->getAdminByAdminCode('admin.content');
        $blogsAdmin = $this->adminPool->getAdminByAdminCode('admin.blogs');

        $datagrids = ['experiences' => $experienceAdmin->getDatagrid(), 'projects' => $projectsAdmin->getDatagrid(), 'content' => $contentAdmin->getDatagrid(), 'blogs' => $blogsAdmin->getDatagrid()];

        $results = [];
        foreach($datagrids as $key => $datagrid){
            $datagrid->buildPager();
            $results[$key] = $datagrid->getResults();
        }

        return $this->json($results);
    }
}