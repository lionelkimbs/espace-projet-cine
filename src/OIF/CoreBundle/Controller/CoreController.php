<?php

namespace OIF\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoreController extends Controller {
    //---- -- TABELAU DE BORD
    public function indexAction(){
        return $this->render('OIFCoreBundle:Core:index.html.twig');
    }

    //---- -- PAGE DU PROFIL
    public function profilAction(){
        return $this->render('OIFCoreBundle:Core:profil.html.twig');
    }

    //---- -- PAGE DES ARCHIVES
    public function archivesAction(){
        return $this->render('OIFCoreBundle:Core:archives.html.twig');
    }

    //---- -- PAGE D'ACCUEIL DE LA PLATEFORME
    public function contactAction(){
        return $this->render('OIFCoreBundle:Core:contact.html.twig');
    }

}
