<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sonata\AdminBundle\Admin\Pool;
use FOS\RestBundle\View\ViewHandlerInterface;

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

    public function getData()
    {
        $experiencesAdmin = $this->adminPool->getAdminByAdminCode('admin.projects');
        $datagrid = $experiencesAdmin->getDatagrid();

        $datagrid->buildPager();
        $experiences = $datagrid->getResults();
        dump($experiences);
        exit;
    }
}