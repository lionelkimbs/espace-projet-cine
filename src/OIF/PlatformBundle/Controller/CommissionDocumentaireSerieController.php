<?php

namespace OIF\PlatformBundle\Controller;

use OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Fichier;
use OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Financement;
use OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Lien;
use OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet;
use OIF\PlatformBundle\Form\CommissionDocumentaireSerie\FichierType;
use OIF\PlatformBundle\Form\CommissionDocumentaireSerie\FinancementType;
use OIF\PlatformBundle\Form\CommissionDocumentaireSerie\LienType;
use OIF\PlatformBundle\Form\CommissionDocumentaireSerie\ProjetEditType;
use OIF\PlatformBundle\Form\CommissionDocumentaireSerie\ProjetType;
use OIF\PlatformBundle\Form\CommissionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CommissionDocumentaireSerieController extends Controller {
/////// RECUPERE LA COMMISSION ACTIVEE
    public function getTheCommission(){
        $em = $this->getDoctrine()->getManager();
        $commission = $em->getRepository('OIFPlatformBundle:Commission')->findOneBy([
                'type' => 1,
                'etat' => 1
            ],
            ['dateDeb' => 'desc']
        );
        return $commission;
    }
/////// RECUPERE LE PROJET
    public function getTheProjet($id){
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository(Projet::class)->findOneBy([
            'id' => $id,
            'user' => $this->getUser()
        ]);
        return $projet;
    }
/////// VERIFIE QUE LA COMMISSION EST ACTIVÉE
    public function checkCommission(){
        if( $this->getTheCommission() === null ){
            return $this->redirectToRoute('oif_core_homepage');
        }
    }

/////// PAGE D'ACCUEIL COM DocumentaireSerie ///
    public function indexAction(Request $request){
        $commission = $this->getTheCommission();
        $formulaire= $this->createForm(CommissionType::class, $commission);
        if( $request->isMethod('POST') && $formulaire->handleRequest($request)->isValid() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commission);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Commission mise à jour avec succès !');
        }
        return $this->render("OIFPlatformBundle:DocumentaireSerie:index.html.twig", [
        'commission' => $commission,
        'form' => $formulaire->createView()
        ]);
    }


/////// AJOUTER UN PROJET ///
    public function addAction(Request $request){
        $this->checkCommission();
        $projet = new Projet();
        $form = $this->createForm(ProjetType::class, $projet);
        if( $request->isMethod('POST') && $form->handleRequest($request)->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $projet->setCommission($this->getTheCommission());
            $projet->setUser($this->getUser());
            $em->persist($projet);
            $em->flush();
            $request->getSession()->getFlashBag()->add('msg_projet', 'Projet documentaire / série crée avec succès !');
            return $this->redirectToRoute('oif_platform_documentaireserie_view', [
                'id' => $projet->getId()
            ]);
        }
        return $this->render("OIFPlatformBundle:DocumentaireSerie:add.html.twig", array(
            'form' => $form->createView(),
        ));
    }

/////// AFFICHER UN PROJET ///
    public function viewAction(Request $request, $id){
        $this->checkCommission();
        if( $this->getTheProjet($id) === null ){
            return $this->redirectToRoute('oif_core_homepage');
        }
        return $this->render('OIFPlatformBundle:DocumentaireSerie:view.html.twig', array(
            'projet' => $this->getTheProjet($id)
        ));
    }

/////// MODIFIER UN PROJET ///
    public function editFicheAction(Request $request, $id){
        $this->checkCommission();
        if( $this->getTheProjet($id) === null ){
            return $this->redirectToRoute('oif_core_homepage');
        }
        $projet = $this->getTheProjet($id);
        $form = $this->createForm(ProjetEditType::class, $projet);
        if( $request->isMethod('POST') && $form->handleRequest($request)->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($projet);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Projet mis à jour avec succès !');
            return $this->redirectToRoute('oif_platform_documentaireserie_view', [
                'id' => $id
            ]);
        }
        return $this->render("OIFPlatformBundle:DocumentaireSerie:edit.html.twig", [
            'form' => $form->createView(),
            'projet' => $projet
        ]);
    }

/////// SUPPRIMER UN PROJET
    public function deleteFicheAction(Request $request, $id){
        $this->checkCommission();
        if( $this->getTheProjet($id) === null ){
            return $this->redirectToRoute('oif_core_homepage');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($this->getTheProjet($id));
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Projet supprimé avec succès !');
        return $this->redirectToRoute('oif_platform_documentaireserie');
    }


/////// MODIFIER LE PLAN DE FINANCEMENT  ///
    public function addFinancementAction(Request $request, $id){
        $this->checkCommission();
        if( $this->getTheProjet($id) === null ){
            return $this->redirectToRoute('oif_core_homepage');
        }
        $projet = $this->getTheProjet($id);
        $financement = new Financement();
        $em = $this->getDoctrine()->getManager();
        $financements = $em->getRepository('OIFPlatformBundle:CommissionDocumentaireSerie\Financement')->findBy(
            ['projet' => $projet]
        );
        $formulaire = $this->createForm(FinancementType::class, $financement);
        if( $request->isMethod('POST') && $formulaire->handleRequest($request)->isValid() ){
            $financement->setProjet($projet);
            $em->persist($financement);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Financement ajouté avec succès !');
            $newFinancements = $em->getRepository('OIFPlatformBundle:CommissionDocumentaireSerie\Financement')->findBy(
                ['projet' => $projet]
            );
            return $this->render('OIFPlatformBundle:DocumentaireSerie:addFinancement.html.twig', array(
                'form' => $formulaire->createView(),
                'projet' => $projet,
                'financements' => $newFinancements
            ));
        }
        return $this->render('OIFPlatformBundle:DocumentaireSerie:addFinancement.html.twig', array(
            'form' => $formulaire->createView(),
            'projet' => $projet,
            'financements' => $financements
        ));
    }
    /// DELETE LE PLAN DE FINANCEMENT  ///
    public function deleteFinancementAction(Request $request, $id){
        $this->checkCommission();
        $em = $this->getDoctrine()->getManager();
        $financement = $em->getRepository('OIFPlatformBundle:CommissionDocumentaireSerie\Financement')->find($id);
        $projet = $financement->getProjet();
        if( $this->getTheProjet($id) === null ){
            return $this->redirectToRoute('oif_core_homepage');
        }
        $em->remove($financement);
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Financement supprimé avec succès !');
        return $this->redirectToRoute('oif_platform_documentaireserie_addFinancement', [
            'id' => $projet->getId(),
        ]);
    }

/////// MODIFIER UN LIEN  ///
    public function addLienAction(Request $request, $id){
        $this->checkCommission();
        if( $this->getTheProjet($id) === null ){
            return $this->redirectToRoute('oif_core_homepage');
        }
        $lien = new Lien();
        $em = $this->getDoctrine()->getManager();
        $projet = $this->getTheProjet($id);
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
            return $this->render('OIFPlatformBundle:DocumentaireSerie:addLien.html.twig', [
                'projet' => $projet,
                'liens' => $newLiens,
                'form' => $formulaire->createView()
            ]);
        }
        return $this->render("OIFPlatformBundle:DocumentaireSerie:addLien.html.twig", [
            'projet' => $projet,
            'liens' => $liens,
            'form' => $formulaire->createView()
        ]);
    }
    /// DELETE UN LIEN  ///
    public function deleteLienAction(Request $request, $id){
        $this->checkCommission();
        $em = $this->getDoctrine()->getManager();
        $lien = $em->getRepository(Lien::class)->find($id);
        $projet = $lien->getProjet();
        if( $projet->getId() === null ){
            return $this->redirectToRoute('oif_core_homepage');
        }
        $em->remove($lien);
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Lien supprimé avec succès !');
        return $this->redirectToRoute('oif_platform_documentaireserie_addLien', [
            'id' => $projet->getId(),
        ]);
    }

/////// MODIFIER UN FICHIER  ///
    public function addFichierAction(Request $request, $id){
        $this->checkCommission();
        if( $this->getTheProjet($id) === null ){
            return $this->redirectToRoute('oif_core_homepage');
        }
        $projet = $this->getTheProjet($id);
        $fichier = new Fichier();
        $fichier->setProjet($projet);
        $em = $this->getDoctrine()->getManager();
        $fichiers = $em->getRepository(Fichier::class)->findBy(
            ['projet' => $projet]
        );
        $form = $this->createForm(FichierType::class, $fichier);
        if( $request->isMethod('POST') && $form->handleRequest($request)->isValid() ){
            //Si ce fichier existe déjà on le supprime de la base pour mettre le nouveau
            $oldFichier = $em->getRepository(Fichier::class)->findOneBy([
                'noaide' => $fichier->getNoaide()
            ]);
            if( !empty($oldFichier) ) $em->remove($oldFichier);
            $em->flush();
            //Titre du fichier
            $listeFichiers = $this->container->get('oif_platform.fichiers_documentaireserie')->listFiles();
            foreach ($listeFichiers as $key => $value){
                if( $fichier->getNoaide() == $key ) $fichier->setTitre($value);
            }
            $em->persist($fichier);
            $em->flush();
            $fichiers = $em->getRepository(Fichier::class)->findBy(
                ['projet' => $projet]
            );
            return $this->render("OIFPlatformBundle:DocumentaireSerie:addFichier.html.twig", [
                'form' => $form->createView(),
                'projet' => $projet,
                'fichiers' => $fichiers
            ]);
        }
        return $this->render("OIFPlatformBundle:DocumentaireSerie:addFichier.html.twig", [
            'form' => $form->createView(),
            'projet' => $projet,
            'fichiers' => $fichiers
        ]);
    }
    /// DELETE UN LIEN  ///
    public function deleteFichierAction($id){
        $this->checkCommission();
        $em = $this->getDoctrine()->getManager();
        $fichier = $em->getRepository(Fichier::class)->find($id);
        $projet = $fichier->getProjet();
        if( $projet->getId() === null ){
            return $this->redirectToRoute('oif_core_homepage');
        }
        $em->remove($fichier);
        $em->flush();
        return $this->redirectToRoute('oif_platform_documentaireserie_addFichier', [
            'id' => $projet->getId(),
        ]);
    }
}
