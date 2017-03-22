<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 3/16/17
 * Time: 2:31 PM
 */

namespace BlogBundle\Controller;

use BlogBundle\Form\BlogCreateForm;
use BlogBundle\Form\BlogEditForm;
use BlogBundle\Form\BlogType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontEndController extends Controller
{
    public function listAction(){
        $em = $this->getDoctrine()->getManager();
        $blogRepo = $em->getRepository('BlogBundle:Blog');

        $blogs = $blogRepo->findBy(['createdBy' => $this->getUser()]);

        return $this->render('@Blog/Blog/list.html.twig', array(
            'blogs' => $blogs
        ));
    }

    public function detailAction($blogId){
        $em = $this->getDoctrine()->getManager();
        $blogRepo = $em->getRepository('BlogBundle:Blog');
        $blog = $blogRepo->findOneBy(['id'=> $blogId]);

        return $this->render('@Blog/Blog/read.html.twig', array(
            'blog' => $blog,
        ));
    }

    public function readAction($blogId)
    {
        $em = $this->getDoctrine()->getManager();
        $blogRepo = $em->getRepository('BlogBundle:Blog');
        $blog = $blogRepo->findOneBy(['id'=> $blogId]);

        if(!is_null($blog)){
            return $this->render('@Blog/Blog/read.html.twig', array(
                'blog' => $blog,
            ));
        }else{
            return $this->render('BlogBundle:Blog:list.html.twig');
        }
    }

    public function createAction(){
        $form = $this->createForm(BlogCreateForm::class);
        return $this->render('@Blog/Blog/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function modifyAction($blogId){
        $form = $this->createForm(BlogEditForm::class);
        $em = $this->getDoctrine()->getManager();
        $blogRepo = $em->getRepository('BlogBundle:Blog');
        $blog = $blogRepo->findOneBy(['id' => $blogId]);
        return $this->render('@Blog/Blog/modify.html.twig', array(
            'form' => $form->createView(),
            'blog' => $blog,
        ));
    }

    public function deleteAction($blogId)
    {
        $em = $this->getDoctrine()->getManager();
        $blogRepo = $em->getRepository('BlogBundle:Blog');
        $blog = $blogRepo->findOneBy(['id' => $blogId]);
        return $this->render('@Blog/Blog/delete.html.twig', array(
            'blog' => $blog,
        ));
    }
}