<?php

namespace OIF\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommissionAudiovisuelleController extends Controller{
    /// PAGE D'ACCUEIL DEPOT PROJET AUDIOVISUEL ///
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $commission = $em->getRepository('OIFPlatformBundle:Commission')->findOneBy(
            [
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

    public function addAction(Request $request){

        return $this->render("OIFPlatformBundle:Audiovisuelle:add.html.twig");
    }

}
