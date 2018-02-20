<?php
// src/medic/SubstanceBundle/Controller/RemedeController.php

namespace medic\SubstanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use medic\SubstanceBundle\Entity\Substance;
use medic\SubstanceBundle\Form\SubstanceType;


class RemedeController extends Controller
{
  public function indexAction($page)
  {
    $listSubstances = $this->getDoctrine()
      ->getManager()
      ->getRepository('medicSubstanceBundle:Substance')
      ->findAll();

    // On donne toutes les informations nécessaires à la vue
    return $this->render('medicSubstanceBundle:Remede:index.html.twig', array(
      'listSubstances' => $listSubstances,
    ));
  }

  public function ajoutAction(Request $request)
  {
    $substance = new Substance();
    $form = $this->get('form.factory')->create(new SubstanceType(), $substance);

    if ($form->handleRequest($request)->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($substance);
      $em->flush();

      $request->getSession()->getFlashBag()->add('info', 'Substance bien enregistrée.');

      return $this->redirect($this->generateUrl('medic_substance_homepage'));
    }


    return $this->render('medicSubstanceBundle:Remede:add.html.twig', array(
      'form' => $form->createView(),
    ));
  }
  
  public function viewAction($id)
  {
    return $this->render('medicSubstanceBundle:Remede:index.html.twig');
  }
}
