<?php

namespace OIF\PlatformBundle\Form\CommissionCinema;


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
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeIntervention',   ChoiceType::class, array('choices' => array('Aide à la production' => 1, 'Aide à la finition' => 2), 'expanded' => true, 'multiple' => false))
            ->add('genre',  ChoiceType::class, array('choices' => array('Fiction' => 1, 'Animation' => 2), 'expanded' => true, 'multiple' => false))
            ->add('format',  ChoiceType::class, array('choices' => array('Court-métrage (- de 30\')' => 1, 'Moyen-métrage (30\' à 60\')' => 2, 'Long-métrage (+ de 60\')' => 3), 'expanded' => true, 'multiple' => false))
            ->add('duree',  IntegerType::class)
            ->add('support',  TextType::class)
            ->add('standard',  TextType::class)
            ->add('titre',  TextType::class)
            ->add('paysRealisateur',    EntityType::class, array(
                'class' => 'OIFCoreBundle:Pays',
                'choice_label' => 'libelle',
                'multiple' => false
            ))
            ->add('realisateur',    TextType::class)
            ->add('anneeNaissance',  IntegerType::class)
            ->add('nomStructure',    TextType::class)
            ->add('typeStructure',  ChoiceType::class, [
                'choices' => [
                    'SA (Société anonyme)' => 1,
                    'SARL ou SPRL (société à responsabilité limitée)' => 2,
                    'EURL (Entreprise unipersonnelle à responsabilité limitée)' => 3,
                    'Organisme public gérant une chaîne de télévision' => 4],
                'expanded' => true,
                'multiple' => false
            ])
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
            ->add('dateDeb',    DateType::class, [
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
            ->add('valider',   SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OIF\PlatformBundle\Entity\CommissionCinema\Projet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'oif_platformbundle_commissioncinema_projet';
    }


}
