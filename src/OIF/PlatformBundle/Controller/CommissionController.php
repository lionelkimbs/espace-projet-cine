<?php

namespace OIF\PlatformBundle\Controller;

use OIF\PlatformBundle\Entity\Commission;
use OIF\PlatformBundle\Form\CommissionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CommissionController extends Controller{
/////// Créer une commission ///
    public function createAction(Request $request){
        $this->notAdmin();

        $commission = new Commission();
        $formulaire = $this->createForm(CommissionType::class, $commission);

        if( $request->isMethod('POST') && $formulaire->handleRequest($request)->isValid() ) {
            //On vérifie si une commission du même type est activée et on la désactive
            $em = $this->getDoctrine()->getManager();
            $em->getRepository('OIFPlatformBundle:Commission')->changeCommission($commission->getType());
            $em->persist($commission);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Commission créee !');
            //return $this->redirectToRoute('oif_core_homepage');
        }
        return $this->render('OIFPlatformBundle:Commission:create.html.twig', [
            'form' => $formulaire->createView()
        ]);
    }

/////// COMMISSION View ///
    public function viewAction(Request $request, $id){
        $this->notAdmin();

        $em = $this->getDoctrine()->getManager();
        $commission = $em->getRepository('OIFPlatformBundle:Commission')->find($id);
        if( $commission  === null ){
            $request->getSession()->getFlashBag()->add('notice', 'Cette commission n\'existe pas !');
            return $this->redirectToRoute('oif_core_homepage');
        }
        $formulaire= $this->createForm(CommissionType::class, $commission);
        if( $request->isMethod('POST') && $formulaire->handleRequest($request)->isValid() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commission);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Commission mise à jour avec succès !');
        }
        return $this->render("OIFPlatformBundle:Commission:view.html.twig", [
            'commission' => $commission,
            'form' => $formulaire->createView(),
        ]);
    }

/////// Delete une commission ///
    public function deleteAction(Request $request, $id){
        $this->notAdmin();

        $em = $this->getDoctrine()->getManager();
        $commission = $em->getRepository('OIFPlatformBundle:Commission')->find($id);
        if( $commission  === null ){
            $request->getSession()->getFlashBag()->add('notice', 'Cette commission n\'existe pas !');
            return $this->redirectToRoute('oif_core_homepage');
        }
        $em->remove($commission);
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Commission supprimée avec succès !');
        return $this->redirectToRoute('oif_core_homepage');
    }

/////// LISTES TOUTES LES COMMISSIONS ///
    public function showAllAction(){
        $this->notAdmin();
        $em = $this->getDoctrine()->getManager();
        $commissions = $em->getRepository(Commission::class)->findAll();
        return $this->render('OIFPlatformBundle:Commission:all_commissions.html.twig', [
            'commissions' => $commissions
        ]);
    }

/////// SI L'UTILISATEUR N'EST PAS ADMIN ///
    private function notAdmin(){
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('oif_core_homepage');
        }
        else return;
    }
}
