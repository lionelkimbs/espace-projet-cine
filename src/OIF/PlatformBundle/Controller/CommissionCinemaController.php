<?php

namespace OIF\PlatformBundle\Controller;

use OIF\PlatformBundle\Entity\CommissionCinema\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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

	//---- -- Ajouter un projet
	public function addAction(Request $request){
	    //--- On crée l'objet Projet
	    $projet = new Projet();

        // On crée le FormBuilder grâce au service form factory
        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $form = $this->get('form.factory')->createBuilder(FormType::class, $projet)
            ->add('typeIntervention',   ChoiceType::class, array('choices' => array('Aide à la production' => 0, 'Aide à la finition' => 1), 'expanded' => true, 'multiple' => false  ))
            ->add('genre',              IntegerType::class)
            ->add('duree',              IntegerType::class)
            ->add('titre',              TextType::class)
            ->add('annee',              IntegerType::class)
            ->add('valider',            SubmitType::class)
            ->getForm();

        //Si la requete est en POST
        if( $request->isMethod('POST') ){
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
            $form->handleRequest($request);

            // On vérifie que les valeurs entrées sont correctes
            if( $form->isValid() ){
                // On enregistre notre objet dans la base de données, par exemple
                $em = $this->getDoctrine()->getManager();
                $em->persist($projet);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Projet crée avec succès !');
                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->redirectToRoute('oif_platform_cinema_view', array(
                    'id' => $projet->getId()
                ));
            }

        }


        //À ce stade, le formulaire n'est pas valide car :
            // Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
            // Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau

        // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
        return $this->render("OIFPlatformBundle:Cinema:add.html.twig", array(
            "form" => $form->createView()
        ));
	}

}

