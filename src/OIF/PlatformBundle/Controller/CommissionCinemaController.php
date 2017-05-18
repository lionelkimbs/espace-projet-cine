<?php

namespace OIF\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommissionCinemaController extends Controller{
	//---- -- PAGE Commission cinéma
	public function indexAction(){
		return $this->render("OIFPlatformBundle:Cinema:index.html.twig");
	}
}
