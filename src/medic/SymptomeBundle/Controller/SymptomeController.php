<?php

namespace medic\SymptomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use medic\SymptomeBundle\Entity\Symptome;
use medic\SymptomeBundle\Form\SymptomeType;

class SymptomeController extends Controller
{
    public function indexAction()
    {
        $listSymptomes = $this->getDoctrine()
        ->getManager()
        ->getRepository('medicSymptomeBundle:Symptome')
        ->findAll();

        return $this->render('medicSymptomeBundle:Symptome:index.html.twig', array(
        'listSymptomes' => $listSymptomes
        ));
    }
    
    public function addAction(Request $request)
    {
        $symptome = new Symptome();
        $form = $this->get('form.factory')->create(new SymptomeType(), $symptome);
        
        if ($form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($symptome);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('info', 'Symptome bien enregistré.');
            
            return $this->redirect($this->generateUrl('medic_symptome_homepage'));
        }
        
        
        return $this->render('medicSymptomeBundle:Symptome:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function viewAction($id)
    {
        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();

        // Pour récupérer un symptome unique : on utilise find()
        $symptome = $em->getRepository('medicSymptomeBundle:Symptome')->find($id);
        
        // Puis modifiez la ligne du render comme ceci, pour prendre en compte les variables :
        return $this->render('medicSymptomeBundle:Symptome:view.html.twig', array(
            'symptome' => $symptome,
        ));
    }
}
