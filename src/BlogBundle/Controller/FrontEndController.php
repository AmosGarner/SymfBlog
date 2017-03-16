<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 3/16/17
 * Time: 2:31 PM
 */

namespace BlogBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontEndController extends Controller
{
    public function listAction(){
        $em = $this->getDoctrine()->getManager();
        return $this->render('@Blog/Blog/list.html.twig');
    }

    public function readAction()
    {
        $em = $this->getDoctrine()->getManager();
        return $this->render('@Blog/Blog/read.html.twig');
    }

    public function createAction(){
        $em = $this->getDoctrine()->getManager();
        return $this->render('@Blog/Blog/create.html.twig');
    }

    public function modifyAction(){
        $em = $this->getDoctrine()->getManager();
        return $this->render('@Blog/Blog/modify.html.twig');
    }

    public function deleteAction()
    {
        $em = $this->getDoctrine()->getManager();
        return $this->render('@Blog/Blog/delete.html.twig');
    }
}