<?php

namespace medic\ExamenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use medic\ExamenBundle\Entity\Examen;
use medic\ExamenBundle\Form\ExamenType;

class ExamenController extends Controller
{
    public function indexAction()
    {
        $listExamens = $this->getDoctrine()
        ->getManager()
        ->getRepository('medicExamenBundle:Examen')
        ->findAll();

        return $this->render('medicExamenBundle:Examen:index.html.twig', array(
        'listExamens' => $listExamens,
        ));
    }
    
    public function addAction(Request $request)
    {
        $examen = new Examen();
        $form = $this->get('form.factory')->create(new ExamenType(), $examen);
        
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($examen);
            $em->flush();

            $request->getSession()->getFlashBag()->add('info', 'Examen bien enregistré.');

            return $this->redirect($this->generateUrl('medic_examen_homepage'));
        }
        
        return $this->render('medicExamenBundle:Examen:add.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}