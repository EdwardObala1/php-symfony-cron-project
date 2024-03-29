<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

final class MediaAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('description', TextType::class);
        $form->add('location', TextType::class);
        $form->add('link', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {   
        $datagrid->add('id');
        $datagrid->add('description');
        $datagrid->add('location');
        $datagrid->add('link');
    }

    protected function configureListFields(ListMapper $list): void
    {   
        $list->addIdentifier('id', 'identifier', ['label' => 'ID']);
        $list->addIdentifier('description');
        $list->addIdentifier('location');
        $list->addIdentifier('link');
        $list->add('_action', 'actions', [
            'label' => 'Actions',
            'actions' => [
                'edit' => [],
            ],
        ]);
    }

    protected function configureShowFields(ShowMapper $show): void
    {   
        $show->add('id');
        $show->add('description');
        $show->add('location');
        $show->add('link');
    }
}