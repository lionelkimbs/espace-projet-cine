<?php

namespace OIF\PlatformBundle\Controller;

use OIF\PlatformBundle\Entity\CommissionCinema\Projet;
use OIF\PlatformBundle\Form\CommissionCinema\ProjetType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CommissionCinemaController extends Controller{
	//---- -- PAGE Commission cinéma
	public function indexAction(){
		return $this->render("OIFPlatformBundle:Cinema:index.html.twig");
	}

	//---- -- PAGE Commission cinéma
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

	//---- -- PAGE AJOUTER LE PLAN DE FINACEMENT
	public function addFinancementAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('OIFPlatformBundle:CommissionCinema\Projet')->find($id);
        if( null === $projet ){
            throw new NotFoundHttpException("Ce projet n'existe pas !");
        }
        return $this->render('OIFPlatformBundle:Cinema:addFinancement.html.twig', array(
            "projet" => $projet
        ));
    }

	//---- -- Ajouter un projet
	public function addAction(Request $request){
	    //--- On crée l'objet Projet
	    $projet = new Projet();

	    $form = $this->createForm(ProjetType::class, $projet);
        //Si la requete est en POST
        if( $request->isMethod('POST') && $form->handleRequest($request)->isValid() ){
            // On enregistre notre objet dans la base de données, par exemple
            $em = $this->getDoctrine()->getManager();
<<<<<<< HEAD

            // On récupère la commission cinéma active
            $commission = $em->getRepository('OIFPlatformBundle:Commission')->findOneBy([
                'type' => 2,
                'etat' => 1
                ]
            );

            $projet->setCommission($commission);

=======
>>>>>>> origin/master
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

<<<<<<< HEAD
    //---- -- PAGE Edit commission cinéma : 1. Fiche
    public function editFiche(){
        return $this->render("OIFPlatformBundle:Cinema:index.html.twig");
    }
=======

>>>>>>> origin/master

}

