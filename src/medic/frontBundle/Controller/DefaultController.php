<?php

namespace medic\frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('medicfrontBundle:Default:index.html.twig');
    }
}
