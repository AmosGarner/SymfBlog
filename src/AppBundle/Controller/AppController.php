<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $blogRepo = $em->getRepository('BlogBundle:Blog');
        $blogs = $blogRepo->getRecentBlogs();

        return $this->render('AppBundle:App:index.html.twig', array(
            'blogs' => $blogs,
        ));
    }

    public function aboutAction(){
        return $this->render('@App/App/about.html.twig');
    }
}
