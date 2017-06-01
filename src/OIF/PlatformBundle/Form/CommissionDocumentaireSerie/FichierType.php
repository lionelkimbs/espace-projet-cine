<?php

namespace OIF\PlatformBundle\Form\CommissionDocumentaireSerie;

use OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet;
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
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("file", FileType::class)
            ->add("valider", SubmitType::class);

        $entity = $builder->getData();
        $projet = $entity->getProjet();

        if( $projet && is_a($projet, Projet::class) ){

            //---------------------------------------//
            //--- 1 : aide à la production - 1: unitaire
            if( $projet->getTypeIntervention() == 1 && $projet->getFormat() == 1 ) {
                $builder
                    ->add("noaide", ChoiceType::class, [
                        "choices" => [
                            "2. Note de synthèse du projet (objectifs, description sommaire, public visé)" => 102,
                            "3. Lettre d'intention de diffusion émanant d'une chaîne de télévision francophone (ou contrat de préachat ou de coproduction d'une télévision qui figurerait parmi les documents fournis au point 10) ou mandat de distribution" => 103,
                            "4. Synopsis " => 104,
                            "5. Scénario dialogué pour les fictions ou traitement pour les documentaires" => 105,
                            "6. Curriculum vitae de l'auteur" => 106,
                            "7. Curriculum vitae du réalisateur" => 107,
                            "8. Budget de production détaillé" => 108,
                            "9. Plan de financement distinguant, d'une part, les financements acquis (à hauteur de 40 %) et, d'autre part, les financements prévus" => 109,
                            "10. Documents attestant des financements acquis (y compris accords de coproduction, contrats de préachat de droits de diffusion et mandats de distribution avec minimum garanti, le cas échéant)" => 110,
                            "11. Calendrier d'exécution mentionnant la date de début de tournage, la durée du tournage, la date de début de la post-production, la durée de la post-production et la date prévisionnelle de livraison  du produit fini" => 111,
                            "12. Plan de diffusion de l'œuvre" => 112,
                            "13. Statuts de la société de production (enregistrés par l'autorité compétente du pays) et répartition de son capital social" => 113,
                            "14. Copies des contrats de cession de droits avec l'(les) auteur(s) du scénario ou du traitement indiquant expressément le montant et le mode de rémunération" => 114,
                            "15. Copies des contrats de cession de droits avec le(s) réalisateur(s) indiquant expressément le montant et le mode de rémunération" => 115,
                            "16. Liste des techniciens du Sud avec leur fonction" => 116,
                            "17. Pour les films d'animation : charte graphique complète comprenant un lot de planches de situation et des dessins des principaux personnages" => 117
                        ]
                    ]
                );
            }

            //---------------------------------------//
            //1 : aide à la production - 2: serie ---//
            elseif( $projet->getTypeIntervention() == 1 && $projet->getFormat() == 2 ) {
                $builder
                    ->add("noaide", ChoiceType::class, [
                        "choices" => [
                            "2. Bible du projet (concept et, pour les projets de fiction : personnages, décors, arches dramatiques)." => 202,
                            "3. Lettre d'intention de diffusion émanant d'une chaîne de télévision francophone (ou contrat de préachat ou de coproduction d'une télévision qui figurerait parmi les documents fournis au point 10) ou mandat de distribution" => 203,
                            "4. Synopsis des 6 premiers épisodes (ou de la totalité des épisodes pour les séries de moins de 6 épisodes) " => 204,
                            "5. Scénarios dialogués de deux épisodes pour les séries de 52' ou plus, trois épisodes pour celles de 26' ou plus et quatre épisodes pour celles de moins de 26'" => 205,
                            "6. Curriculum vitae du (des) réalisateur(s)" => 206,
                            "7. Curriculum vitae du (des) scénariste(s)" => 207,
                            "8. Budget de production détaillé" => 208,
                            "9. Plan de financement distinguant, d'une part, les financements acquis (à hauteur de 40 %) et, d'autre part, les financements prévus" => 209,
                            "10. Documents attestant des financements acquis (y compris accords de coproduction, contrats de préachat de droits de diffusion et mandats de distribution avec minimum garanti, le cas échéant)" => 210,
                            "11. Calendrier d'exécution mentionnant la date de début de tournage, la durée du tournage, la date de début de la post-production, la durée de la post-production et la date prévisionnelle de livraison  du produit fini" => 211,
                            "12. Plan de diffusion et de circulation de l'œuvre" => 212,
                            "13. Statuts de la structure de production (enregistrés par l'autorité compétente du pays) et répartition de son capital social" => 213,
                            "14. Copies des contrats de cession de droits avec l'(les) auteur(s) du scénario ou du traitement indiquant expressément le montant et le mode de rémunération" => 214,
                            "15. Copies des contrats de cession de droits avec le(s) réalisateur(s) indiquant expressément le montant et le mode de rémunération" => 215,
                            "16. Liste des techniciens du Sud avec leur fonction" => 216,
                            "17. Pour les séries d'animation : charte graphique complète comprenant un lot de planches de situation et des dessins des principaux personnages" => 217
                        ]
                    ]
                );
            }

            //---------------------------------------//
            //2 : aide à la finition - 1: unitaire ---//
            elseif( $projet->getTypeIntervention() == 2 && $projet->getFormat() == 1 ) {
                $builder
                    ->add("noaide", ChoiceType::class, [
                        "choices" => [
                            "2. Note de synthèse du projet (objectifs, description sommaire, public visé)" => 302,
                            "3. Note justifiant le besoin d'une aide à la finition et précisant son emploi exact" => 303,
                            "4. Lettre d'intention de diffusion émanant d'une chaîne de télévision francophone (ou contrat de préachat ou de coproduction d'une télévision ou mandat de distribution" => 304,
                            "5. Synopsis" => 305,
                            "6. Scénario" => 306,
                            "7. Curriculum vitae du (des) réalisateur(s)" => 307,
                            "8. Curriculum vitae du (des) scénariste(s)" => 308,
                            "9. Budget de postproduction détaillé (comportant éventuellement des devis des prestataires)" => 309,
                            "10. Budget de l'ensemble de la production" => 310,
                            "11. Plan de financement distinguant les financements acquis et prévus" => 311,
                            "12. Calendrier d'exécution de la postproduction dont la durée ne pourra excéder six mois après réception de la subvention" => 312,
                            "13. Plan de diffusion et de circulation de l'œuvre" => 313,
                            "14. Statuts de la structure de production (enregistrés par l'autorité compétente du pays) et répartition de son capital social" => 314,
                            "15. Copies des contrats de cession de droits avec l'(les) auteur(s) du scénario ou du traitement indiquant expressément le montant et le mode de rémunération" => 315,
                            "16. Copies des contrats de cession de droits avec le(s) réalisateur(s) indiquant expressément le montant et le mode de rémunération" => 316,
                            "17. Pour les films d'animation : charte graphique complète comprenant un lot de planches de situation et des dessins des principaux personnages" => 317
                        ]
                    ]
                );
            }

            //---------------------------------------//
            //2 : aide à la finition - 2: série ---//
            elseif( $projet->getTypeIntervention() == 2 && $projet->getFormat() == 2 ) {
                $builder
                    ->add("noaide", ChoiceType::class, [
                        "choices" => [
                            "2. Note de synthèse du projet (objectifs, description sommaire, public visé)" => 402,
                            "3. Note justifiant le besoin d'une aide à la finition et précisant son emploi exact" => 403,
                            "4. Lettre d'intention de diffusion émanant d'une chaîne de télévision francophone (ou contrat de préachat ou de coproduction d'une télévision ou mandat de distribution" => 404,
                            "5. Synopsis" => 405,
                            "6. Curriculum vitae du (des) réalisateur(s)" => 406,
                            "7. Curriculum vitae du (des) scénariste(s)" => 407,
                            "8. Budget de postproduction détaillé (comportant éventuellement des devis des prestataires)" => 408,
                            "9. Budget de l'ensemble de la production" => 409,
                            "10. Plan de financement distinguant les financements acquis et prévus" => 410,
                            "11. Calendrier d'exécution de la postproduction dont la durée ne pourra excéder six mois après réception de la subvention" => 411,
                            "12. Plan de diffusion et de circulation de l'œuvre " => 412,
                            "13. Statuts de la structure de production (enregistrés par l'autorité compétente du pays) et répartition de son capital social" => 413,
                            "14. Copies des contrats de cession de droits avec l'(les) auteur(s) du scénario ou du traitement indiquant expressément le montant et le mode de rémunération" => 414,
                            "15. Copies des contrats de cession de droits avec le(s) réalisateur(s) indiquant expressément le montant et le mode de rémunération" => 415
                        ]
                    ]
                );
            }


        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'=> 'OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Fichier'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'oif_platformbundle_commissiondocumentaireserie_fichier';
    }


}
