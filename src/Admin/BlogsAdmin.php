<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class BlogsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('title', TextType::class);
        $form->add('blog', TextType::class);
        $form->add('publish_date', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {   
        $datagrid->add('id');
        $datagrid->add('title');
        $datagrid->add('blog');
        $datagrid->add('publish_date');
    }

    protected function configureListFields(ListMapper $list): void
    {   
        $list->addIdentifier('id');
        $list->addIdentifier('title');
        $list->addIdentifier('blog');
        $list->addIdentifier('publish_date');
    }

    protected function configureShowFields(ShowMapper $show): void
    {   
        $show->add('id');
        $show->add('title');
        $show->add('blog');
        $show->add('publish_date');
    }
}