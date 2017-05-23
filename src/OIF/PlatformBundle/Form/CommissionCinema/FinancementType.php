<?php

namespace OIF\PlatformBundle\Form\CommissionCinema;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FinancementType extends AbstractType{
    //FORMULAIRE DE FINANCEMENT DU PROJET
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('partenaire', TextType::class)
            ->add('montant',   IntegerType::class)
            ->add('negociation',    ChoiceType::class, [
                'choices' => [
                    'Prévu' => 0,
                    'Acquis' => 1
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('valider',    SubmitType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => 'OIF\PlatformBundle\Entity\CommissionCinema\Financement'
        ]);
    }

    /**
     * @return string
     */
    public function getBlockPrefix(){
        return 'oif_platformbundle_commissioncinema_financement';
    }

}