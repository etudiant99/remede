<?php

namespace medic\PatientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use medic\PatientBundle\Entity\Patient;
use medic\PatientBundle\Entity\ExamenPatient;
use medic\ExamenBundle\Entity\Examen;
use medic\PatientBundle\Entity\SymptomePatient;
use medic\PatientBundle\Form\PatientType;
use medic\PatientBundle\Form\ExamenPatientType;
use medic\PatientBundle\Form\ConnectionType;
use medic\PatientBundle\Form\SymptomePatientType;

class PatientController extends Controller
{
    public function indexAction()
    {
        $listPatients = $this->getDoctrine()
        ->getManager()
        ->getRepository('medicPatientBundle:Patient')
        ->getPatients();
    
        return $this->render('medicPatientBundle:Patient:index.html.twig', array(
        'listPatients' => $listPatients,
        ));
    }
    
    public function connexionAction(Request $request)
    {   
        $patient = new Patient();
        $form = $this->get('form.factory')->create(new ConnectionType(), $patient);
        
        $listPatients = $this->getDoctrine()
        ->getManager()
        ->getRepository('medicPatientBundle:Patient');

        
        if ($form->handleRequest($request)->isValid()) {
            $post = $form['nam']->getData();
            $session = $request->getSession();
            $session->set('post', $post);

            $monPatient = $listPatients->findBy(
                array('nam' => $post)
            );
            
            if ($monPatient == null)
            {
                $session = $request->getSession();
                $session->set('monpatient', null);
                return $this->redirect($this->generateUrl('medic_patient_add'));
            }
            $monId = $monPatient[0]->getId();
            $em = $this->container->get('doctrine')->getEntityManager();
            $personne = $em->find('medicPatientBundle:Patient', $monId);
            
            // Récupération de la session
            $session = $request->getSession();
            $session->set('monpatient', $personne);
            

            $age = $listPatients->getAge(array('monPatient' => $monPatient));
            
            return $this->render('medicPatientBundle:Patient:monpatient.html.twig', array('monPatient' => $monPatient, 'age' => $age));
        }
        
        return $this->render('medicPatientBundle:Patient:connexion.html.twig', array('form' => $form->createView()));
    }
    
    public function addAction(Request $request)
    {
        $patient = new Patient();
        $form = $this->get('form.factory')->create(new PatientType(), $patient);
        
        if ($form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($patient);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('info', 'Patient bien enregistré.');
            
            return $this->redirect($this->generateUrl('medic_patient_homepage'));
        }
        
        return $this->render('medicPatientBundle:Patient:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function addExamenAction(Request $request)
    {
        $examenPatient = new ExamenPatient();
        $form = $this->get('form.factory')->create(new ExamenPatientType(), $examenPatient);
        
        if ($form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($examenPatient);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('info', 'Examen pour un patient bien enregistré.');
            
            return $this->redirect($this->generateUrl('medic_patient_homepage'));
        }

        return $this->render('medicPatientBundle:Patient:addExamen.html.twig', array(
            'form' => $form->createView(),
         ));
    }
    
    public function episodeAction(Request $request)
    {
        
        $symptomePatient = new SymptomePatient();

        // Récupération de la session
        $session = $request->getSession();
        $monpatient = $session->get('monpatient');
        
        if ($monpatient instanceof Patient)
            $symptomePatient->setPatient($monpatient);
        else
        {
            return $this->render('medicPatientBundle:Patient:vide.html.twig');
        }
            
        $form = $this->get('form.factory')->create(new SymptomePatientType(), $symptomePatient);
        
        if ($form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($symptomePatient);
            $em->flush();

            
            $request->getSession()->getFlashBag()->add('info', 'Symptôme pour le patient bien enregistré.');
            return $this->redirect($this->generateUrl('medic_patient_homepage'));
        }

        return $this->render('medicPatientBundle:Patient:episode.html.twig', array('form' => $form->createView(), 'monpatient' => $monpatient));

    }
}
