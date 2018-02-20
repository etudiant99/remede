<?php

namespace medic\SymptomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('medicSymptomeBundle:Default:index.html.twig');
    }
}
