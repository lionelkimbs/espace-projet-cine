<?php

namespace OIF\PlatformBundle\Controller;

use OIF\PlatformBundle\Entity\CommissionAudiovisuelle\Fichier;
use OIF\PlatformBundle\Entity\CommissionAudiovisuelle\Financement;
use OIF\PlatformBundle\Entity\CommissionAudiovisuelle\Lien;
use OIF\PlatformBundle\Entity\CommissionAudiovisuelle\Projet;
use OIF\PlatformBundle\Form\CommissionAudiovisuelle\FichierType;
use OIF\PlatformBundle\Form\CommissionAudiovisuelle\FinancementType;
use OIF\PlatformBundle\Form\CommissionAudiovisuelle\LienType;
use OIF\PlatformBundle\Form\CommissionAudiovisuelle\ProjetEditType;
use OIF\PlatformBundle\Form\CommissionAudiovisuelle\ProjetType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommissionAudiovisuelleController extends Controller{
/////// RECUPERE LA COMMISSION EXISTANT ///
    public function getTheCommission(){
        $em = $this->getDoctrine()->getManager();
        $commission = $em->getRepository('OIFPlatformBundle:Commission')->findOneBy([
                'type' => 1,
                'etat' => 1
            ]
        );
        return $commission;
    }

/////// VERIFIE QU'UN PROJET EXISTE BEL ET BIEN ///
    public function checkProjet($id){
        $request = Request::class;
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('OIFPlatformBundle:CommissionAudiovisuelle\Projet')->find($id);

        if( $this->getTheCommission() === null ){
            $request->getSession()->getFlashBag()->add('notice', 'La commission audiovisuelle n\'est pas ouverte acutuellement !');
            return $this->redirectToRoute('oif_core_homepage');
        }

        if( null === $projet ){
            $request->getSession()->getFlashBag()->add("notice", "Ce projet n'existe pas !");
            return $this->redirectToRoute('oif_core_homepage');
        }
        else return;
    }

/////// PAGE D'ACCUEIL DEPOT PROJET AUDIOVISUEL ///
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $commission = $em->getRepository('OIFPlatformBundle:Commission')->findOneBy([
            'type' => 1,
            'etat' => 1
        ],
            [
                'dateDeb' => 'desc'
            ]
        );
        return $this->render("OIFPlatformBundle:Audiovisuelle:index.html.twig", [
            'commission' => $commission
        ]);
    }

/////// AJOUTER UN PROJET ///
    public function addAction(Request $request){
        if( $this->getTheCommission() === null ){
            $request->getSession()->getFlashBag()->add('notice', 'La commission audiovisuelle n\'est pas ouverte acutuellement !');
            return $this->redirectToRoute('oif_core_homepage');
        }

        $projet = new Projet();
        $form = $this->createForm(ProjetType::class, $projet);
        //--- Si la requete est en POST
        if( $request->isMethod('POST') && $form->handleRequest($request)->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $projet->setCommission($this->getTheCommission());
            $em->persist($projet);
            $em->flush();
            $request->getSession()->getFlashBag()->add('msg_projet', 'Projet crée avec succès !');
            // On redirige vers la page de visualisation du projet nouvellement créé
            return $this->redirectToRoute('oif_platform_audiovisuelle_view', array(
                'id' => $projet->getId()
            ));
        }

        return $this->render("OIFPlatformBundle:Audiovisuelle:add.html.twig", array(
            'form' => $form->createView(),
        ));
    }

/////// AFFICHER UN PROJET ///
    public function viewAction(Request $request, $id){
        if( $this->getTheCommission() === null ){
            $request->getSession()->getFlashBag()->add('msg_commission', 'La commission audiovisuelle n\'est pas ouverte acutuellement !');
            return $this->redirectToRoute('oif_core_homepage');
        }

        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('OIFPlatformBundle:CommissionAudiovisuelle\Projet')->find($id);
        if( null === $projet ){
            $request->getSession()->getFlashBag()->add("notice", "Ce projet n'existe pas !");
            return $this->redirectToRoute('oif_core_homepage');
        }
        return $this->render('OIFPlatformBundle:Audiovisuelle:view.html.twig', array(
            'projet' => $projet
        ));
    }

/////// MODIFIER UN PROJET ///
    public function editFicheAction(Request $request, $id){
        // Fait une redirection si le projet n'existe pas ou si la commission n'existe pas
        $this->checkProjet($id);

        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('OIFPlatformBundle:CommissionAudiovisuelle\Projet')->find($id);
        $form = $this->createForm(ProjetEditType::class, $projet);
        if( $request->isMethod('POST') && $form->handleRequest($request)->isValid() ){
            $em->persist($projet);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Projet mis à jour avec succès !');
            return $this->redirectToRoute('oif_platform_audiovisuelle_view', [
                'id' => $id
            ]);
        }
        return $this->render("OIFPlatformBundle:Audiovisuelle:edit.html.twig", [
            'form' => $form->createView(),
            'projet' => $projet
        ]);

    }

/////// DELETE UN PROJET
    public function deleteFicheAction(Request $request, $id){
        $this->checkProjet($id);

        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository(Projet::class)->find($id);
        $em->remove($projet);
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Projet supprimé avec succès !');
        return $this->redirectToRoute('oif_platform_audiovisuelle');
    }

/////// MODIFIER LE PLAN DE FINANCEMENT  ///
    public function addFinancementAction(Request $request, $id){
        $this->checkProjet($id);

        $financement = new Financement();
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('OIFPlatformBundle:CommissionAudiovisuelle\Projet')->find($id);
        $financements = $em->getRepository('OIFPlatformBundle:CommissionAudiovisuelle\Financement')->findBy(
            ['projet' => $projet]
        );
        $formulaire = $this->createForm(FinancementType::class, $financement);
        /// On envoie le formulaire en POST ///
        if( $request->isMethod('POST') && $formulaire->handleRequest($request)->isValid() ){
            /// On n'oublie pas de définir le projet concerné hein
            $financement->setProjet($projet);
            $em->persist($financement);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Financement ajouté avec succès !');
            $newFinancements = $em->getRepository('OIFPlatformBundle:CommissionAudiovisuelle\Financement')->findBy(
                ['projet' => $projet]
            );
            return $this->render('OIFPlatformBundle:Audiovisuelle:addFinancement.html.twig', array(
                'form' => $formulaire->createView(),
                'projet' => $projet,
                'financements' => $newFinancements
            ));
        }
        return $this->render('OIFPlatformBundle:Audiovisuelle:addFinancement.html.twig', array(
            'form' => $formulaire->createView(),
            'projet' => $projet,
            'financements' => $financements
        ));
    }
/////// DELETE LE PLAN DE FINANCEMENT  ///
    public function deleteFinancementAction(Request $request, $id){
        $this->checkProjet($id);

        $em = $this->getDoctrine()->getManager();
        $financement = $em->getRepository('OIFPlatformBundle:CommissionAudiovisuelle\Financement')->find($id);
        /// On recupère d'abord le projet concerné ///
        $projet = $financement->getProjet();
        /// Et on supprime le financement ///
        $em->remove($financement);
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Financement supprimé avec succès !');

        /// Retour sur la page de financement
        return $this->redirectToRoute('oif_platform_audiovisuelle_addFinancement', [
            'id' => $projet->getId(),
        ]);
    }


/////// MODIFIER UN LIEN  ///
    public function addLienAction(Request $request, $id){
        $this->checkProjet($id);

        $lien = new Lien();
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository(Projet::class)->find($id);
        $liens = $em->getRepository(Lien::class)->findBy(
            ['projet' => $projet]
        );
        $formulaire = $this->createForm(LienType::class, $lien);
        if( $request->isMethod('POST') && $formulaire->handleRequest($request)->isValid() ){
            $lien->setProjet($projet);
            $em->persist($lien);
            $em->flush();
            $newLiens = $em->getRepository(Lien::class)->findBy(
                ['projet' => $projet]
            );
            return $this->render('OIFPlatformBundle:Audiovisuelle:addLien.html.twig', [
                'projet' => $projet,
                'liens' => $newLiens,
                'form' => $formulaire->createView()
            ]);
        }
        return $this->render("OIFPlatformBundle:Audiovisuelle:addLien.html.twig", [
            'projet' => $projet,
            'liens' => $liens,
            'form' => $formulaire->createView()
        ]);
    }
/////// DELETE UN LIEN  ///
    public function deleteLienAction(Request $request, $id){
        $this->checkProjet($id);

        $em = $this->getDoctrine()->getManager();
        $financement = $em->getRepository(Lien::class)->find($id);
        /// On recupère d'abord le projet concerné ///
        $projet = $financement->getProjet();
        /// Et on supprime le financement ///
        $em->remove($financement);
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Lien supprimé avec succès !');

        /// Retour sur la page de financement
        return $this->redirectToRoute('oif_platform_audiovisuelle_addLien', [
            'id' => $projet->getId(),
        ]);
    }


/////// MODIFIER UN FICHIER  ///
    public function addFichierAction(Request $request, $id){
        $fichier = new Fichier();
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository(Projet::class)->find($id);
        $fichier->setProjet($projet);
        $fichiers = $em->getRepository(Fichier::class)->findBy(
            ['projet' => $projet]
        );
        $form = $this->createForm(FichierType::class, $fichier);

        if( $request->isMethod('POST') && $form->handleRequest($request)->isValid() ){
            //Titre du fichier
            switch ($fichier->getNoaide()){
                case 2:
                    $fichier->setTitre('CV');
                    break;
                case 3:
                    $fichier->setTitre('Script');
                    break;
            }
            $em->persist($fichier);
            $em->flush();

            $fichiers = $em->getRepository(Fichier::class)->findBy(
                ['projet' => $projet]
            );
            return $this->render("OIFPlatformBundle:Audiovisuelle:addFichier.html.twig", [
                'form' => $form->createView(),
                'projet' => $projet,
                'fichiers' => $fichiers
            ]);
        }
        return $this->render("OIFPlatformBundle:Audiovisuelle:addFichier.html.twig", [
            'form' => $form->createView(),
            'projet' => $projet,
            'fichiers' => $fichiers
        ]);
    }


}
