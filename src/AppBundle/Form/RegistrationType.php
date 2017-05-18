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

/*    public function getName(){
        return 'app_user_registration';
    }
    public function getFirstname(){
        return 'app_user_registration';
    }
    public function getPhone(){
        return 'app_user_registration';
    }
    public function getCellular(){
        return 'app_user_registration';
    }
    public function getActivity(){
        return 'app_user_registration';
    }
    public function getCountry(){
        return 'app_user_registration';
    }
    public function getInformations(){
        return 'app_user_registration';
    }
    public function getWebsite(){
        return 'app_user_registration';
    }
    public function getFacebook(){
        return 'app_user_registration';
    }
    public function getTwitter(){
        return 'app_user_registration';
    }
    public function getLinkedin(){
        return 'app_user_registration';
    }
    public function getAutorisation(){
        return 'app_user_registration';
    }*/
}
