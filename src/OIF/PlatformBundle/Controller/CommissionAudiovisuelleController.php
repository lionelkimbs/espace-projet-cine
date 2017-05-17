<?php

namespace OIF\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommissionAudiovisuelleController extends Controller{
    //---- -- PAGE Commission audiovisuelle
    public function indexAction(){
        return $this->render("OIFPlatformBundle:Audiovisuelle:index.html.twig");
    }
}
