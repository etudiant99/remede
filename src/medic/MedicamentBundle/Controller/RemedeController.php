<?php
// src/medic/MedicamentBundle/Controller/RemedeController.php

namespace medic\MedicamentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use medic\MedicamentBundle\Entity\Medicament;
use medic\MedicamentBundle\Form\MedicamentType;

class RemedeController extends Controller
{
  public function indexAction($page)
  {
    
    // Ici je fixe le nombre d'annonces par page à 3
    // Mais bien sûr il faudrait utiliser un paramètre, et y accéder via $this->container->getParameter('nb_per_page')
    $nbParPage = 3;

    // On récupère notre objet Paginator
    $listMedicaments = $this->getDoctrine()
      ->getManager()
      ->getRepository('medicMedicamentBundle:Medicament')
      ->getMedicaments($page, $nbParPage);

    // On calcule le nombre total de pages grâce au count($listAdverts) qui retourne le nombre total d'annonces
    $nbPages = ceil(count($listMedicaments)/$nbParPage);
    
    // On donne toutes les informations nécessaires à la vue
    return $this->render('medicMedicamentBundle:Remede:index.html.twig', array(
      'listMedicament' => $listMedicaments,
      'nbPages'     => $nbPages,
      'page'        => $page,
      'nb_page'    => ceil(count($listMedicaments) / $nbParPage) ?: 1
    ));
  }
  
  public function addAction(Request $request)
  {
    $medicament = new Medicament();
    $form = $this->get('form.factory')->create(new MedicamentType(), $medicament);

    if ($form->handleRequest($request)->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($medicament);
      $em->flush();

      $request->getSession()->getFlashBag()->add('info', 'Médicament bien enregistrée.');

      return $this->redirect($this->generateUrl('medic_medicament_homepage'));
    }


    return $this->render('medicMedicamentBundle:Remede:add.html.twig', array(
      'form' => $form->createView(),
    ));
  }
  
  public function viewAction(Medicament $medicament)
  {
    // On récupère l'EntityManager
    $em = $this->getDoctrine()->getManager();

    // Pour récupérer une annonce unique : on utilise find()
    $medicament = $em->getRepository('medicMedicamentBundle:Medicament')->find($medicament);
    

    // Puis modifiez la ligne du render comme ceci, pour prendre en compte les variables :
    return $this->render('medicMedicamentBundle:Remede:view.html.twig', array(
      'medicament'           => $medicament,
    ));
  }

  public function editAction(Medicament $medicament, Request $request)
  {
    $em = $this->getDoctrine()->getManager();

    // On récupère le slug de l'annonce
    $medicament = $em->getRepository('medicMedicamentBundle:Medicament')->find($medicament);

    if (null === $medicament) {
      throw new NotFoundHttpException("Le médicament ".$medicament." n'existe pas.");
    }

    // Étape 2 : On déclenche l'enregistrement
    $em->flush();

    $em = $this->getDoctrine()->getManager();

    // On récupère le slug du médicament
    $medicament = $em->getRepository('medicMedicamentBundle:Medicament')->find($medicament);

    if (null === $medicament) {
      throw new NotFoundHttpException("Le médicament ".$medicament." n'existe pas.");
    }

    $form = $this->createForm(new MedicamentType(), $medicament);

    if ($form->handleRequest($request)->isValid()) {
      // Inutile de persister ici, Doctrine connait déjà notre annonce
      $em->flush();

      $request->getSession()->getFlashBag()->add('info', 'Médicament bien modifié.');

      return $this->redirect($this->generateUrl('medic_medicament_homepage', array('slug' => $medicament->getSlug())));
    }

    return $this->render('medicMedicamentBundle:Remede:edit.html.twig', array(
      'form'   => $form->createView(),
      'medicament' => $medicament // Je passe également l'annonce à la vue si jamais elle veut l'afficher
    ));
  }
  
  public function deleteAction(Medicament $medicament, Request $request)
  {
    $em = $this->getDoctrine()->getManager();

    // On récupère le slug du médicament
    $medicament = $em->getRepository('medicMedicamentBundle:Medicament')->find($medicament);

    if (null === $medicament) {
      throw new NotFoundHttpException("Le médicament ".$medicament." n'existe pas.");
    }


    // Pour persister le changement dans la relation, il faut persister l'entité propriétaire
    // Ici, Advert est le propriétaire, donc inutile de la persister car on l'a récupérée depuis Doctrine

    // On déclenche la modification
    $em->flush();

    $em = $this->getDoctrine()->getManager();

    // On récupère le slug du médicament
    $medicament = $em->getRepository('medicMedicamentBundle:Medicament')->find($medicament);

    if (null === $medicament) {
      throw new NotFoundHttpException("Le médicament ".$medicament." n'existe pas.");
    }

    // On crée un formulaire vide, qui ne contiendra que le champ CSRF
    // Cela permet de protéger la suppression d'annonce contre cette faille
    $form = $this->createFormBuilder()->getForm();

    if ($form->handleRequest($request)->isValid()) {
      // On boucle sur les catégories de l'annonce pour les supprimer
      foreach ($medicament->getSubstances() as $substance) {
        $medicament->removeSubstance($substance);
      }

      $em->remove($medicament);
      $em->flush();

      $request->getSession()->getFlashBag()->add('info', "Le médicament a bien été supprimé.");

      return $this->redirect($this->generateUrl('medic_medicament_homepage'));
    }

    // Si la requête est en GET, on affiche une page de confirmation avant de supprimer
    return $this->render('medicMedicamentBundle:Remede:delete.html.twig', array(
      'medicament' => $medicament,
      'form'   => $form->createView()
    ));
  }

}
