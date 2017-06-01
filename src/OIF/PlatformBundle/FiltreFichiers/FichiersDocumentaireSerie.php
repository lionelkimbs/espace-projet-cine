<?php

namespace OIF\PlatformBundle\FiltreFichiers;

class FichiersDocumentaireSerie{
    public function listFiles(){
        $fichiers = [
            //--- 1 : aide à la production - 1: unitaire
            101 => "1. Formulaire de présentation de projet (à remplir en ligne, sur le site Images francophones)",
            102 => "2. Note de synthèse du projet (objectifs, description sommaire, public visé)",
            103 => "3. Lettre d'intention de diffusion émanant d'une chaîne de télévision francophone (ou contrat de préachat ou de coproduction d'une télévision qui figurerait parmi les documents fournis au point 10) ou mandat de distribution",
            104 => "4. Synopsis ",
            105 => "5. Scénario dialogué pour les fictions ou traitement pour les documentaires",
            106 => "6. Curriculum vitae de l'auteur",
            107 => "7. Curriculum vitae du réalisateur",
            108 => "8. Budget de production détaillé",
            109 => "9. Plan de financement distinguant, d'une part, les financements acquis (à hauteur de 40 %) et, d'autre part, les financements prévus",
            110 => "10. Documents attestant des financements acquis (y compris accords de coproduction, contrats de préachat de droits de diffusion et mandats de distribution avec minimum garanti, le cas échéant)",
            111 => "11. Calendrier d'exécution mentionnant la date de début de tournage, la durée du tournage, la date de début de la post-production, la durée de la post-production et la date prévisionnelle de livraison  du produit fini",
            112 => "12. Plan de diffusion de l'œuvre",
            113 => "13. Statuts de la société de production (enregistrés par l'autorité compétente du pays) et répartition de son capital social",
            114 => "14. Copies des contrats de cession de droits avec l'(les) auteur(s) du scénario ou du traitement indiquant expressément le montant et le mode de rémunération",
            115 => "15. Copies des contrats de cession de droits avec le(s) réalisateur(s) indiquant expressément le montant et le mode de rémunération",
            116 => "16. Liste des techniciens du Sud avec leur fonction",
            117 => "17. Pour les films d'animation : charte graphique complète comprenant un lot de planches de situation et des dessins des principaux personnages",

            //1 : aide à la production - 2: serie ---//
            201 => "1. Formulaire de présentation de projet (à remplir en ligne, sur le site Images francophones)",
            202 => "2. Bible du projet (concept et, pour les projets de fiction : personnages, décors, arches dramatiques).",
            203 => "3. Lettre d'intention de diffusion émanant d'une chaîne de télévision francophone (ou contrat de préachat ou de coproduction d'une télévision qui figurerait parmi les documents fournis au point 10) ou mandat de distribution",
            204 => "4. Synopsis des 6 premiers épisodes (ou de la totalité des épisodes pour les séries de moins de 6 épisodes) ",
            205 => "5. Scénarios dialogués de deux épisodes pour les séries de 52' ou plus, trois épisodes pour celles de 26' ou plus et quatre épisodes pour celles de moins de 26'",
            206 => "6. Curriculum vitae du (des) réalisateur(s)",
            207 => "7. Curriculum vitae du (des) scénariste(s)",
            208 => "8. Budget de production détaillé",
            209 => "9. Plan de financement distinguant, d'une part, les financements acquis (à hauteur de 40 %) et, d'autre part, les financements prévus",
            210 => "10. Documents attestant des financements acquis (y compris accords de coproduction, contrats de préachat de droits de diffusion et mandats de distribution avec minimum garanti, le cas échéant)",
            211 => "11. Calendrier d'exécution mentionnant la date de début de tournage, la durée du tournage, la date de début de la post-production, la durée de la post-production et la date prévisionnelle de livraison  du produit fini",
            212 => "12. Plan de diffusion et de circulation de l'œuvre",
            213 => "13. Statuts de la structure de production (enregistrés par l'autorité compétente du pays) et répartition de son capital social",
            214 => "14. Copies des contrats de cession de droits avec l'(les) auteur(s) du scénario ou du traitement indiquant expressément le montant et le mode de rémunération",
            215 => "15. Copies des contrats de cession de droits avec le(s) réalisateur(s) indiquant expressément le montant et le mode de rémunération",
            216 => "16. Liste des techniciens du Sud avec leur fonction",
            217 => "17. Pour les séries d'animation : charte graphique complète comprenant un lot de planches de situation et des dessins des principaux personnages",

            //2 : aide à la finition - 1: unitaire ---//
            301 => "1. Formulaire de présentation de projet",
            302 => "2. Note de synthèse du projet (objectifs, description sommaire, public visé)",
            303 => "3. Note justifiant le besoin d'une aide à la finition et précisant son emploi exact",
            304 => "4. Lettre d'intention de diffusion émanant d'une chaîne de télévision francophone (ou contrat de préachat ou de coproduction d'une télévision ou mandat de distribution",
            305 => "5. Synopsis",
            306 => "6. Scénario",
            307 => "7. Curriculum vitae du (des) réalisateur(s)",
            308 => "8. Curriculum vitae du (des) scénariste(s)",
            309 => "9. Budget de postproduction détaillé (comportant éventuellement des devis des prestataires)",
            310 => "10. Budget de l'ensemble de la production",
            311 => "11. Plan de financement distinguant les financements acquis et prévus",
            312 => "12. Calendrier d'exécution de la postproduction dont la durée ne pourra excéder six mois après réception de la subvention",
            313 => "13. Plan de diffusion et de circulation de l'œuvre",
            314 => "14. Statuts de la structure de production (enregistrés par l'autorité compétente du pays) et répartition de son capital social",
            315 => "15. Copies des contrats de cession de droits avec l'(les) auteur(s) du scénario ou du traitement indiquant expressément le montant et le mode de rémunération",
            316 => "16. Copies des contrats de cession de droits avec le(s) réalisateur(s) indiquant expressément le montant et le mode de rémunération",
            317 => "17. Pour les films d'animation : charte graphique complète comprenant un lot de planches de situation et des dessins des principaux personnages",

            //2 : aide à la finition - 2: série ---//
            401 => "1. Formulaire de présentation de projet",
            402 => "2. Note de synthèse du projet (objectifs, description sommaire, public visé)",
            403 => "3. Note justifiant le besoin d'une aide à la finition et précisant son emploi exact",
            404 => "4. Lettre d'intention de diffusion émanant d'une chaîne de télévision francophone (ou contrat de préachat ou de coproduction d'une télévision ou mandat de distribution",
            405 => "5. Synopsis",
            406 => "6. Curriculum vitae du (des) réalisateur(s)",
            407 => "7. Curriculum vitae du (des) scénariste(s)",
            408 => "8. Budget de postproduction détaillé (comportant éventuellement des devis des prestataires)",
            409 => "9. Budget de l'ensemble de la production",
            410 => "10. Plan de financement distinguant les financements acquis et prévus",
            411 => "11. Calendrier d'exécution de la postproduction dont la durée ne pourra excéder six mois après réception de la subvention",
            412 => "12. Plan de diffusion et de circulation de l'œuvre ",
            413 => "13. Statuts de la structure de production (enregistrés par l'autorité compétente du pays) et répartition de son capital social",
            414 => "14. Copies des contrats de cession de droits avec l'(les) auteur(s) du scénario ou du traitement indiquant expressément le montant et le mode de rémunération",
            415 => "15. Copies des contrats de cession de droits avec le(s) réalisateur(s) indiquant expressément le montant et le mode de rémunération"
        ];

        return $fichiers;
    }
}
