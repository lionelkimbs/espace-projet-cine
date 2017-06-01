<?php

namespace OIF\PlatformBundle\Form\CommissionDocumentaireSerie;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('typeIntervention',   ChoiceType::class, [
                'choices' => [
                    'Aide à la production' => 1,
                    'Aide à la finition' => 2
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('genre',  ChoiceType::class, array(
                'choices' =>
                    [
                        'Animation' => 1,
                        'Fiction' => 2,
                        'Documentaire' => 3
                    ],
                'expanded' => true,
                'multiple' => false)
            )
            ->add('format',   ChoiceType::class, [
                'choices' => [
                    'Unitaire' => 1,
                    'Série' => 2
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('duree', TextType::class)
            ->add('episode', IntegerType::class, [

            ])
            ->add('support',  ChoiceType::class, [
                'choices' => [
                    'HD' => 1,
                    'Beta numérique' => 2,
                    'LDV CAM ou DVC PRO' => 3,
                    'Autres' => 4
                ],
                'expanded' => true,
                'multiple' => false]
            )
            ->add('titre',  TextType::class)
            ->add('paysRealisateur',    EntityType::class, array(
                'class' => 'OIFCoreBundle:Pays',
                'choice_label' => 'libelle',
                'multiple' => false
            ))
            ->add('realisateur',    TextType::class)
            ->add('anneeNaissance',    IntegerType::class)
            ->add('nomStructure',    TextType::class)
            ->add('typeStructure',  ChoiceType::class, [
                'choices' => [
                    'SA (Société anonyme)' => 0,
                    'SARL ou SPRL (société à responsabilité limitée)' => 1,
                    'EURL (Entreprise unipersonnelle à responsabilité limitée)' => 2,
                    'Organisme public gérant une chaîne de télévision' => 3],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('capital',  IntegerType::class)
            ->add('devise',    TextType::class)
            ->add('adresseStructure',    TextType::class)
            ->add('codePostal',    TextType::class)
            ->add('villeStructure',    TextType::class)
            ->add('paysStructure',    EntityType::class, array(
                'class' => 'OIFCoreBundle:Pays',
                'choice_label' => 'libelle',
                'multiple' => false
            ))
            ->add('nomResponsable',    TextType::class)
            ->add('prenomResponsable',    TextType::class)
            ->add('telResponsable',    TextType::class)
            ->add('emailResponsable', EmailType::class)
            ->add('dateDeb', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => array('class' => 'date')
            ])
            ->add('dateFin',    DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => array('class' => 'date')
            ])
            ->add('coutTotal',  IntegerType::class)
            ->add('montantDemande', IntegerType::class)
            ->add('valider', SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'oif_platformbundle_commissiondocumentaireserie_projet';
    }


}
