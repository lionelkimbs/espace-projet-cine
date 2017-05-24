<?php

namespace OIF\PlatformBundle\Controller;

use OIF\PlatformBundle\Entity\Commission;
use OIF\PlatformBundle\Form\CommissionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CommissionController extends Controller{

    /// Créer une commission ///
    public function createCommissionAction(Request $request){
        $commission = new Commission();
        $formulaire = $this->createForm(CommissionType::class, $commission);

        if( $request->isMethod('POST') && $formulaire->handleRequest($request)->isValid() ) {
            //On vérifie si une commission du même type est activée et on la désactive
            $em = $this->getDoctrine()->getManager();

            $type = $commission->getType();

            $comActuels = $em->getRepository('OIFPlatformBundle:Commission')->findBy([
                'type' => $type,
                'etat' => 1
            ]);
            foreach ($comActuels as $comActuel) {
                $comActuel->setEtat(0);
                $em->persist($comActuel);
                $em->flush();
            }

            $em->persist($commission);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Commission créee !');
            return $this->redirectToRoute('oif_core_homepage');
        }

        return $this->render('OIFPlatformBundle:Commission:create.html.twig', [
            'form' => $formulaire->createView()
        ]);
    }
}