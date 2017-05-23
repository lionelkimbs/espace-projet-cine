<?php

namespace OIF\PlatformBundle\Controller;

use OIF\PlatformBundle\Entity\CommissionCinema\Fichier;
use OIF\PlatformBundle\Entity\CommissionCinema\Financement;
use OIF\PlatformBundle\Entity\CommissionCinema\Lien;
use OIF\PlatformBundle\Entity\CommissionCinema\Piece;
use OIF\PlatformBundle\Entity\CommissionCinema\Projet;
use OIF\PlatformBundle\Form\CommissionCinema\FinancementType;
use OIF\PlatformBundle\Form\CommissionCinema\LienType;
use OIF\PlatformBundle\Form\CommissionCinema\PieceType;
use OIF\PlatformBundle\Form\CommissionCinema\ProjetType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CommissionCinemaController extends Controller{
    /// PAGE D'ACCUEIL DEPOT PROJET CINEMA ///
	public function indexAction(){
		return $this->render("OIFPlatformBundle:Cinema:index.html.twig");
	}


    /// AFFICHER UN PROJET ///
	public function viewAction($id){
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('OIFPlatformBundle:CommissionCinema\Projet')->find($id);

        if( null === $projet ){
            throw new NotFoundHttpException("Ce projet n'existe pas !");
        }

        return $this->render('OIFPlatformBundle:Cinema:view.html.twig', array(
            "projet" => $projet
        ));
	}


	/// PAGE AJOUTER FINACEMENT ///
	public function addFinancementAction(Request $request, $id){
	    ////// NOUVEAU FINANCEMENT /////
        $financement = new Financement();

        /// On récupère le projet concerné ///
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('OIFPlatformBundle:CommissionCinema\Projet')->find($id);

        /// On récupère tous les financements déjà effectués ///
        $financements = $em->getRepository('OIFPlatformBundle:CommissionCinema\Financement')->findBy(
            ['projet' => $projet]
        );

        if( null === $projet ){
            throw new NotFoundHttpException("Ce projet n'existe pas !");
        }

        /// SI on a arrive jusqu'ici, c'est que c'est bon, on crée le form ///
        $formulaire = $this->createForm(FinancementType::class, $financement);
        /// On envoie le formulaire en POST ///
        if( $request->isMethod('POST') && $formulaire->handleRequest($request)->isValid() ){
            /// On n'oublie pas de définir le projet concerné hein
            $financement->setProjet($projet);

            $em->persist($financement);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Financement ajouté avec succès !');

            /// On reslectionne les financements et redirige sur la même page
            $newFinancements = $em->getRepository('OIFPlatformBundle:CommissionCinema\Financement')->findBy(
                ['projet' => $projet]
            );

            return $this->render('OIFPlatformBundle:Cinema:addFinancement.html.twig', array(
                'form' => $formulaire->createView(),
                'projet' => $projet,
                'financements' => $newFinancements
            ));
        }
        return $this->render('OIFPlatformBundle:Cinema:addFinancement.html.twig', array(
            'form' => $formulaire->createView(),
            'projet' => $projet,
            'financements' => $financements
        ));
    }


    /// SUPPRIMER UN FINANCEMENT ///
    public function deleteFinancementAction(Request $request, $id){
	    $em = $this->getDoctrine()->getManager();
        $financement = $em->getRepository('OIFPlatformBundle:CommissionCinema\Financement')->find($id);
	    /// On recupère d'abord le projet concerné ///
        $projet = $financement->getProjet();
        /// Et on supprime le financement ///
	    $em->remove($financement);
	    $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Financement supprimé avec succès !');

        /// Retour sur la page de financement
        return $this->redirectToRoute('oif_platform_cinema_addFinancement', [
            'id' => $projet->getId(),
        ]);
    }


    /// AJOUTER UN LIEN ///
    public function addLienAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('OIFPlatformBundle:CommissionCinema\Projet')->find($id);
        $lien = new Lien();
        $formulaire = $this->createForm(LienType::class, $lien);

        $liens = $em->getRepository('OIFPlatformBundle:CommissionCinema\Lien')->findBy(
            ['projet' => $projet]
        );

        if( $request->isMethod('POST') && $formulaire->handleRequest($request)->isValid() ){
            $lien->setProjet($projet);
            $em->persist($lien);
            $em->flush();
            $newLiens = $em->getRepository('OIFPlatformBundle:CommissionCinema\Lien')->findBy(
                ['projet' => $projet]
            );

            return $this->render('OIFPlatformBundle:Cinema:addLien.html.twig', [
                'projet' => $projet,
                'liens' => $newLiens,
                'form' => $formulaire->createView()
            ]);
        }
        return $this->render("OIFPlatformBundle:Cinema:addLien.html.twig", [
            'projet' => $projet,
            'liens' => $liens,
            'form' => $formulaire->createView()
        ]);
    }


    /// SUPPRIMER UN LIEN ///
    public function deleteLienAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $lien = $em->getRepository('OIFPlatformBundle:CommissionCinema\Lien')->find($id);
        $projet = $lien->getProjet();
        $em->remove($lien);
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Lien supprimé avec succès !');

        return $this->redirectToRoute('oif_platform_cinema_addLien', [
            'id' => $projet->getId(),
        ]);
    }


    /// AJOUTER UNE PIECE ///
    public function addPieceAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('OIFPlatformBundle:CommissionCinema\Projet')->find($id);
        $piece = new Piece();

        /// Liste des pièces ///
        for($i = 2 ; $i <= 17 ; $i++){
            $fichier = new Fichier();
            $fichier->setNoAide($i);
            $piece->getFichier()->add($fichier);
        }

        $form = $this->createForm(PieceType::class, $piece);

        $pieces = $em->getRepository('OIFPlatformBundle:CommissionCinema\Piece')->findBy(
            ['projet' => $projet]
        );

        if( $request->isMethod('POST') && $form->handleRequest($request)->isValid() ){
            $piece->setProjet($projet);
            $em->persist($piece);
            $em->flush();
            return $this->render('OIFPlatformBundle:Cinema:addPiece.html.twig', [
                'projet' => $projet,
                'pieces' => $pieces,
                'form' => $form->createView()
            ]);
        }
        return $this->render("OIFPlatformBundle:Cinema:addPiece.html.twig", [
            'projet' => $projet,
            'pieces' => $pieces,
            'form' => $form->createView()
        ]);
    }


    /// AJOUTER UN PROJET ///
	public function addAction(Request $request){
	    //--- On crée l'objet Projet
	    $projet = new Projet();

	    $form = $this->createForm(ProjetType::class, $projet);
        //Si la requete est en POST
        if( $request->isMethod('POST') && $form->handleRequest($request)->isValid() ){
            // On enregistre notre objet dans la base de données, par exemple
            $em = $this->getDoctrine()->getManager();

            // On récupère la commission cinéma active
            $commission = $em->getRepository('OIFPlatformBundle:Commission')->findOneBy([
                'type' => 2,
                'etat' => 1
                ]
            );

            $projet->setCommission($commission);

            $em->persist($projet);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Projet crée avec succès !');

            // On redirige vers la page de visualisation du projet nouvellement créé
            return $this->redirectToRoute('oif_platform_cinema_view', array(
                'id' => $projet->getId()
            ));
        }


        //À ce stade, le formulaire n'est pas valide car :
            // Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
            // Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau

        // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
        return $this->render("OIFPlatformBundle:Cinema:add.html.twig", array(
            "form" => $form->createView()
        ));
	}


    /// MODIFIER UN PROJET ///
    public function editFiche(){
        return $this->render("OIFPlatformBundle:Cinema:index.html.twig");
    }

}

