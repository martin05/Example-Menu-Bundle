<?php

namespace Martin\ExampleMenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

   /**
    * @Route("/{slug}", name="_menu_show")
    * @Template()
    */
    public function showMenuAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('MartinExampleMenuBundle:Menu')->findOneBySlug($slug);
        if (!$entity) {
           throw $this->createNotFoundException('Not found menu');
        }

        return array('entity' => $entity);
    }
}
