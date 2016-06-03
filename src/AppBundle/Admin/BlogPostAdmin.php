<?php
/**
 * Created by PhpStorm.
 * User: npk
 * Date: 03/06/2016
 * Time: 16:02
 */
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogPostAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', array('class' => 'col-md-9'))
            ->add('title', 'text')
            ->add('body', 'textarea')
            ->end()

            ->with('Meta data', array('class' => 'col-md-3'))
            ->add('category', 'entity', array(
                'class' => 'AppBundle\Entity\Category',
                'choice_label' => 'name',
            ))
            ->end()
        ;

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        // ... configure $listMapper
    }

    public function toString($object)
    {
//        return $object instanceof BlogPost
//            ? $object->getTitle()
//            : 'Blog Post'; // shown in the breadcrumb on the create view

        return $object->getTitle();
    }
}