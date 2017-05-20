<?php

namespace OIF\PlatformBundle\Form\CommissionCinema;

use OIF\CoreBundle\Repository\PaysRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
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
        $pattern = 0;

        $builder
            ->add('typeIntervention',   ChoiceType::class, array('choices' => array('Aide à la production' => 0, 'Aide à la finition' => 1), 'expanded' => true, 'multiple' => false))
            ->add('genre',  ChoiceType::class, array('choices' => array('Fiction' => 0, 'Animation' => 1), 'expanded' => true, 'multiple' => false))
            ->add('duree',  ChoiceType::class, array('choices' => array('Court-métrage (- de 30\')' => 0, 'Moyen-métrage (30\' à 60\')' => 1, 'Long-métrage (+ de 60\')' => 2), 'expanded' => true, 'multiple' => false))
            ->add('support',  TextType::class)
            ->add('standard',  TextType::class)
            ->add('titre',  TextType::class)
            ->add('paysRealisateur',    EntityType::class, array(
                'class' => 'OIFCoreBundle:Pays',
                'choice_label' => 'libelle',
                'multiple' => false,
                'query_builder' => function(PaysRepository $repository) use($pattern){ return $repository->getLikeQueryBuilder($pattern); }
            ))
            ->add('realisateur',    TextType::class)
            ->add('annee',  IntegerType::class)
            ->add('nomStructure',    TextType::class)
            ->add('typeStructure',  ChoiceType::class, array('choices' => array('SA (Société anonyme)' => 0, 'SARL ou SPRL (société à responsabilité limitée)' => 1, 'EURL (Entreprise unipersonnelle à responsabilité limitée)' => 2, 'Organisme public gérant une chaîne de télévision' => 3), 'expanded' => true, 'multiple' => false))
            ->add('adresseStructure',    TextType::class)
            ->add('villeStructure',    TextType::class)
            ->add('paysStructure',    EntityType::class, array(
                'class' => 'OIFCoreBundle:Pays',
                'choice_label' => 'libelle',
                'multiple' => false,
                'query_builder' => function(PaysRepository $repository) use($pattern){ return $repository->getLikeQueryBuilder($pattern); }
            ))
            ->add('nomResponsable',    TextType::class)
            ->add('prenomResponsable',    TextType::class)
            ->add('telResponsable',    TextType::class)
            ->add('emailResponsable', EmailType::class)
            ->add('dateDeb',    DateTimeType::class)
            ->add('dateFin',    DateTimeType::class)
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
