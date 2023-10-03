<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sonata\AdminBundle\Admin\Pool;
use FOS\RestBundle\View\ViewHandlerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContactsController extends AbstractController
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
     * @Route("/api/contacts", name="apicontacts", methods={"GET"})
    */

    public function getData(): JsonResponse
    {
        $contactsAdmin = $this->adminPool->getAdminByAdminCode('admin.contacts');
        $datagrid = $contactsAdmin->getDatagrid();

        $datagrid->buildPager();
        $contacts = $datagrid->getResults();
        return $this->json($contacts);
    }
}