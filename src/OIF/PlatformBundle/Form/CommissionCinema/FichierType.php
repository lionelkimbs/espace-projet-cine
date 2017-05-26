<?php

namespace OIF\PlatformBundle\Form\CommissionCinema;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FichierType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('file', FileType::class)
            ->add('valider', SubmitType::class);

        $entity = $builder->getData();
        $projet = $entity->getProjet();

        if( $projet && is_a($projet,'OIF\PlatformBundle\Entity\CommissionCinema\Projet') ){
            if( $projet->getTypeIntervention() != 1 ) {
                $builder
                    ->add('noaide', ChoiceType::class, [
                        'choices' => [
                            'CV' => 2,
                            'Script' => 3,
                        ]
                    ]);
            }
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OIF\PlatformBundle\Entity\CommissionCinema\Fichier'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'oif_platformbundle_commissioncinema_fichier';
    }


}
