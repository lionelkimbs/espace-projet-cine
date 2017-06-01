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
            if( $projet->getTypeIntervention() == 1 ) {
                $builder
                    ->add('noaide', ChoiceType::class, [
                        'choices' => [
                            "2. Note de synthèse du projet (objectifs, description sommaire, public visé)" => 602,
                            "3. Lettre d'intention de diffusion émanant d'une chaîne de télévision francophone (ou contrat de préachat ou de coproduction d'une télévision qui figurerait parmi les documents fournis au point 10) ou mandat de distribution" => 603,
                            "4. Synopsis " => 604,
                            "5. Scénario dialogué pour les fictions ou traitement pour les documentaires" => 605,
                            "6. Curriculum vitae de l'auteur" => 606,
                            "7. Curriculum vitae du réalisateur" => 607,
                            "8. Budget de production détaillé" => 608,
                            "9. Plan de financement distinguant, d'une part, les financements acquis (à hauteur de 40 %) et, d'autre part, les financements prévus" => 609,
                            "10. Documents attestant des financements acquis (y compris accords de coproduction, contrats de préachat de droits de diffusion et mandats de distribution avec minimum garanti, le cas échéant)" => 610,
                            "11. Calendrier d'exécution mentionnant la date de début de tournage, la durée du tournage, la date de début de la post-production, la durée de la post-production et la date prévisionnelle de livraison  du produit fini" => 611,
                            "12. Plan de diffusion de l'œuvre" => 612,
                            "13. Statuts de la société de production (enregistrés par l'autorité compétente du pays) et répartition de son capital social" => 613,
                            "14. Copies des contrats de cession de droits avec l'(les) auteur(s) du scénario ou du traitement indiquant expressément le montant et le mode de rémunération" => 614,
                            "15. Copies des contrats de cession de droits avec le(s) réalisateur(s) indiquant expressément le montant et le mode de rémunération" => 615,
                            "16. Liste des techniciens du Sud avec leur fonction" => 616,
                            "17. Pour les films d'animation : charte graphique complète comprenant un lot de planches de situation et des dessins des principaux personnages" => 617,
                        ]
                    ]);
            }
            elseif ( $projet->getTypeIntervention() == 2 ) {
                $builder
                    ->add('noaide', ChoiceType::class, [
                        'choices' => [
                            "2. Note de synthèse du projet (objectifs, description sommaire, public visé)" => 702,
                            "3. Note justifiant le besoin d'une aide à la finition et précisant son emploi exact" => 703,
                            "4. Lettre d'intention de diffusion émanant d'une chaîne de télévision francophone (ou contrat de préachat ou de coproduction d'une télévision ou mandat de distribution" => 704,
                            "5. Synopsis" => 705,
                            "6. Scénario" => 706,
                            "7. Curriculum vitae du (des) réalisateur(s)" => 707,
                            "8. Curriculum vitae du (des) scénariste(s)" => 708,
                            "9. Budget de postproduction détaillé (comportant éventuellement des devis des prestataires)" => 709,
                            "10. Budget de l'ensemble de la production" => 710,
                            "11. Plan de financement distinguant les financements acquis et prévus" => 711,
                            "12. Calendrier d'exécution de la postproduction dont la durée ne pourra excéder six mois après réception de la subvention" => 712,
                            "13. Plan de diffusion et de circulation de l'œuvre" => 713,
                            "14. Statuts de la structure de production (enregistrés par l'autorité compétente du pays) et répartition de son capital social" => 714,
                            "15. Copies des contrats de cession de droits avec l'(les) auteur(s) du scénario ou du traitement indiquant expressément le montant et le mode de rémunération" => 715,
                            "16. Copies des contrats de cession de droits avec le(s) réalisateur(s) indiquant expressément le montant et le mode de rémunération" => 716,
                            "17. Pour les films d'animation : charte graphique complète comprenant un lot de planches de situation et des dessins des principaux personnages" => 717,
                        ]
                    ])
                ;
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
