<?php
// src/Admin/ExperiencesAdmin.php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

final class ProjectsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('title', TextType::class);
        $form->add('description', TextType::class);
        $form->add('projectlink', TextType::class);
        $form->add('icons', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('id');
        $datagrid->add('title');
        $datagrid->add('description');
        $datagrid->add('projectlink');
        $datagrid->add('icons');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->addIdentifier('id', 'identifier', ['label' => 'ID']);
        $list->add('title');
        $list->add('description');
        $list->add('projectlink');
        $list->add('icons');
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('id');
        $show->add('title');
        $show->add('description');
        $show->add('projectlink');
        $show->add('icons');
    }
}