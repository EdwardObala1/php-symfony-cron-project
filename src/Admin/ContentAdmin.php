<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

final class ContentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('title', TextType::class);
        $form->add('body', CKEditorType::class);
        // $form->add('media', DateType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {   
        $datagrid->add('id');
        $datagrid->add('title');
        $datagrid->add('body');
        $datagrid->add('media');
    }

    protected function configureListFields(ListMapper $list): void
    {   
        $list->addIdentifier('id', 'identifier', ['label' => 'ID']);
        $list->addIdentifier('title');
        $list->addIdentifier('body');
        $list->addIdentifier('media');
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
        $show->add('title');
        $show->add('body');
        $show->add('media');
    }
}