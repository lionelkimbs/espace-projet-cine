<?php

namespace OIF\UserBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('name',   TextType::class)
            ->add('firstname',   TextType::class)
            ->add('phone',   TextType::class, array('required' => false))
            ->add('cellular',   TextType::class, array('required' => false))
            ->add('pays',    EntityType::class, array(
                'class' => 'OIFCoreBundle:Pays',
                'choice_label' => 'libelle',
                'multiple' => false
            ))
            ->add('activite',    EntityType::class, array(
                'class' => 'OIFCoreBundle:Activite',
                'choice_label' => 'libelle',
                'multiple' => false
            ))
            ->add('informations',   TextareaType::class, array('required' => false))
            ->add('website',   TextType::class, array('required' => false))
            ->add('facebook',   TextType::class, array('required' => false))
            ->add('twitter',   TextType::class, array('required' => false))
            ->add('linkedin',   TextType::class, array('required' => false))
            ->add('autorisation',   CheckboxType::class, array(
                'label' => 'J\'autorise que mes coordonnées soient consultables depuis l\'annuaire et les archives du site Images francophones.'
            ))
            ->getForm();
    }

    public function getParent(){
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OIF\UserBundle\Entity\User',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(){
        return 'oif_userbundle_user';
    }


}
