<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sonata\AdminBundle\Admin\Pool;
use FOS\RestBundle\View\ViewHandlerInterface;

class ExperiencesController extends AbstractController
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
     * @Route("/api/experiences", name="apiexperiencces", methods={"GET"})
    */

    public function getData()
    {
        $experiencesAdmin = $this->adminPool->getAdminByAdminCode('admin.experiences');
        $datagrid = $experiencesAdmin->getDatagrid();

        $datagrid->buildPager();
        $experiences = $datagrid->getResults();
        dump($experiences);
        exit;
        // return $this->json($experiences);
    }
}