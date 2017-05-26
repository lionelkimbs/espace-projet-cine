<?php

namespace OIF\PlatformBundle\Form\CommissionAudiovisuelle;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProjetEditType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->remove('dateCreation');
    }

    public function getParent(){
        return ProjetType::class;
    }
}