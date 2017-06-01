<?php

namespace OIF\CoreBundle\Controller;

use OIF\PlatformBundle\Entity\Commission;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class CoreController extends Controller {
    //---- -- TABELAU DE BORD
    /**
     * @Security("has_role('ROLE_USER')")
     */
    public function indexAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Commission::class);

        //On commence par désactiver les commissions qui ne sont plus d'actualité et activer les actuelles
        $repository->activeCurrentCommission();
        $repository->disableOldCommission();

        $commissions = $repository->findBy([
            'etat' => 1,
            'exception' => 0
        ]);
        return $this->render('OIFCoreBundle:Core:index.html.twig', [
            'commissions' => $commissions
        ]);
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
