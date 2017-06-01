<?php

namespace OIF\PlatformBundle\FiltreFichiers;

class FichiersCinema{


    public function listFiles(){
        $fichiers = [
            //--- 1 : aide à la production
            601 => "1. Formulaire de présentation de projet (à remplir en ligne, sur le site Images francophones)",
            602 => "2. Note de synthèse du projet (objectifs, description sommaire, public visé)",
            603 => "3. Lettre d'intention de diffusion émanant d'une chaîne de télévision francophone (ou contrat de préachat ou de coproduction d'une télévision qui figurerait parmi les documents fournis au point 10) ou mandat de distribution",
            604 => "4. Synopsis ",
            605 => "5. Scénario dialogué pour les fictions ou traitement pour les documentaires",
            606 => "6. Curriculum vitae de l'auteur",
            607 => "7. Curriculum vitae du réalisateur",
            608 => "8. Budget de production détaillé",
            609 => "9. Plan de financement distinguant, d'une part, les financements acquis (à hauteur de 40 %) et, d'autre part, les financements prévus",
            610 => "10. Documents attestant des financements acquis (y compris accords de coproduction, contrats de préachat de droits de diffusion et mandats de distribution avec minimum garanti, le cas échéant)",
            611 => "11. Calendrier d'exécution mentionnant la date de début de tournage, la durée du tournage, la date de début de la post-production, la durée de la post-production et la date prévisionnelle de livraison  du produit fini",
            612 => "12. Plan de diffusion de l'œuvre",
            613 => "13. Statuts de la société de production (enregistrés par l'autorité compétente du pays) et répartition de son capital social",
            614 => "14. Copies des contrats de cession de droits avec l'(les) auteur(s) du scénario ou du traitement indiquant expressément le montant et le mode de rémunération",
            615 => "15. Copies des contrats de cession de droits avec le(s) réalisateur(s) indiquant expressément le montant et le mode de rémunération",
            616 => "16. Liste des techniciens du Sud avec leur fonction",
            617 => "17. Pour les films d'animation : charte graphique complète comprenant un lot de planches de situation et des dessins des principaux personnages",

            //2 : aide à la finition
            701 => "1. Formulaire de présentation de projet",
            702 => "2. Note de synthèse du projet (objectifs, description sommaire, public visé)",
            703 => "3. Note justifiant le besoin d'une aide à la finition et précisant son emploi exact",
            704 => "4. Lettre d'intention de diffusion émanant d'une chaîne de télévision francophone (ou contrat de préachat ou de coproduction d'une télévision ou mandat de distribution",
            705 => "5. Synopsis",
            706 => "6. Scénario",
            707 => "7. Curriculum vitae du (des) réalisateur(s)",
            708 => "8. Curriculum vitae du (des) scénariste(s)",
            709 => "9. Budget de postproduction détaillé (comportant éventuellement des devis des prestataires)",
            710 => "10. Budget de l'ensemble de la production",
            711 => "11. Plan de financement distinguant les financements acquis et prévus",
            712 => "12. Calendrier d'exécution de la postproduction dont la durée ne pourra excéder six mois après réception de la subvention",
            713 => "13. Plan de diffusion et de circulation de l'œuvre",
            714 => "14. Statuts de la structure de production (enregistrés par l'autorité compétente du pays) et répartition de son capital social",
            715 => "15. Copies des contrats de cession de droits avec l'(les) auteur(s) du scénario ou du traitement indiquant expressément le montant et le mode de rémunération",
            716 => "16. Copies des contrats de cession de droits avec le(s) réalisateur(s) indiquant expressément le montant et le mode de rémunération",
            717 => "17. Pour les films d'animation : charte graphique complète comprenant un lot de planches de situation et des dessins des principaux personnages",
        ];

        return $fichiers;
    }

}
