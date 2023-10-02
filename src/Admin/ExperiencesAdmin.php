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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

final class ExperiencesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('title', TextType::class);
        $form->add('startDate', DateType::class, array(
            'widget' => 'single_text',
            'attr' => array('class' => 'form-control', 'style' => 'line-height: 20px; width:10%;'), 'label' => 'Start Date',
          ));
        $form->add('endDate', DateType::class, array(
            'widget' => 'single_text',
            'attr' => array('class' => 'form-control', 'style' => 'line-height: 20px; width:10%;'), 'label' => 'End Date',
          ));
        $form->add('location', TextType::class, array('attr' => array('class' => 'form-control location', 'style' => 'height:20%;')));
        $form->add('remote', ChoiceType::class, [
            'choices'  => [
                'Remote' => '1',
                'Not Remote' => '0',
            ],
            'expanded' => true,
            'multiple' => false,  // ensure only one option can be selected
        ]);
        $form->add('description', TextType::class, array(
            'attr' => array('class' => 'form-control-text')
        ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('id');
        $datagrid->add('title');
        $datagrid->add('startDate');
        $datagrid->add('endDate');
        $datagrid->add('location');
        $datagrid->add('remote');
        $datagrid->add('description');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->addIdentifier('id', 'identifier', ['label' => 'ID']);
        $list->add('title');
        $list->add('startDate');
        $list->add('endDate');
        $list->add('location');
        $list->add('remote');
        $list->add('description');
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('id');
        $show->add('title');
        $show->add('startDate');
        $show->add('endDate');
        $show->add('location');
        $show->add('remote');
        $show->add('description');
    }
}