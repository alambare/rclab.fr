<?php

namespace RCLAB\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('@RCLABWebsite/Default/index.html.twig');
    }



    public function contactAction()
    {
        $infoAssociation = $this->getDoctrine();


        $personnes = $this->getDoctrine()->getManager()->getRepository('RCLABUserBundle:User')->findUserFonctionByTri(3);

        return $this->render('@RCLABWebsite/Default/contact.html.twig', array(
            'infoAssociation' => $infoAssociation,
            'personnes' => $personnes,
        ));
    }

    public function reparationAction()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY', null, 'Impossible d\'accéder à cette page !');

        return $this->render('@RCLABWebsite/Default/reparation.html.twig');
    }

    public function compteAction()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY', null, 'Impossible d\'accéder à cette page !');

        return $this->render('@RCLABWebsite/Default/compte.html.twig');
    }
}
