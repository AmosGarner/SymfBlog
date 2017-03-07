<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:App:index.html.twig');
    }

    public function aboutAction(){
        return $this->render('@App/App/about.html.twig');
    }
}
