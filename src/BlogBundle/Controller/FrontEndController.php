<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 3/16/17
 * Time: 2:31 PM
 */

namespace BlogBundle\Controller;


use BlogBundle\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;

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
        $blog = new Blog();

        $form = $this->createFormBuilder($blog)
            ->add('name', TextType::class, array(
                'constraints' => new Length(array('min' => 5))
            ))
            ->add('description', TextareaType::class, array(
                'constraints' => new Length(array('min' => 5, 'max' => 250))
            ))
            ->add('submit', SubmitType::class, array('label' => 'Create Blog'))
            ->getForm();

        return $this->render('@Blog/Blog/create.html.twig', array(
            'form' => $form->createView(),
        ));
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