<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class ContactsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('contactName', TextType::class);
        $form->add('email', TextType::class);
        $form->add('phoneNumber', TextType::class);
        $form->add('alternateEmail', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {   
        $datagrid->add('id');
        $datagrid->add('contactName');
        $datagrid->add('email');
        $datagrid->add('phoneNumber');
        $datagrid->add('alternateEmail');
    }

    protected function configureListFields(ListMapper $list): void
    {   
        $list->addIdentifier('id', 'identifier', ['label' => 'ID']);
        $list->addIdentifier('contactName', ['label' => 'Contact Name']);
        $list->addIdentifier('email', ['label' => 'Email']);
        $list->addIdentifier('phoneNumber', ['label' => 'Phone Number']);
        $list->addIdentifier('alternateEmail', ['label' => 'Alternate Email']);
    }

    protected function configureShowFields(ShowMapper $show): void
    {   
        $show->add('id');
        $show->add('contactName');
        $show->add('email');
        $show->add('phoneNumber');
        $show->add('alternateEmail');
    }
}