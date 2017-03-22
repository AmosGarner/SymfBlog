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
        $authors = $em->getRepository('UserBundle:User')->getAuthors();

        return $this->render('AppBundle:App:index.html.twig', array(
            'blogs' => $blogs,
            'authors' => $authors
        ));
    }

    public function aboutAction(){
        return $this->render('@App/App/about.html.twig');
    }
}
