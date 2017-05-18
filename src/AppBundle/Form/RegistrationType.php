<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('firstname');
        $builder->add('phone');
        $builder->add('cellular');
        $builder->add('activity');
        $builder->add('country');
        $builder->add('informations');
        $builder->add('website');
        $builder->add('facebook');
        $builder->add('twitter');
        $builder->add('linkedin');
        $builder->add('autorisation');
    }


    public function getParent(){
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix(){
        return 'app_user_registration';
    }
}
