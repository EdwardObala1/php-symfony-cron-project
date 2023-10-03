<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sonata\AdminBundle\Admin\Pool;
use FOS\RestBundle\View\ViewHandlerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class DocumentsController extends AbstractController
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
     * @Route("/api/documents", name="apidocuments", methods={"GET"})
    */

    public function getData(): JsonResponse
    {
        $documentsAdmin = $this->adminPool->getAdminByAdminCode('admin.documents');
        $datagrid = $documentsAdmin->getDatagrid();

        $datagrid->buildPager();
        $documents = $datagrid->getResults();
        return $this->json($documents);
    }
}