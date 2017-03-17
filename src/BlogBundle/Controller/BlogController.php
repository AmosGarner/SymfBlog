<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 2/21/17
 * Time: 3:11 PM
 */

namespace BlogBundle\Controller;

use BlogBundle\Entity\Blog;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends ApiController
{

    public function listAction($userId){

    }

    public function createAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $requestData = $request->request->all()['blog'];

        $blog = $this->createBlog($requestData);
        $em->persist($blog);
        $em->flush();

        $response = $this->generateApiResponse('', 200);

        return $this->render('@Blog/Blog/list.html.twig', array(
            'response' => $response,
        ));
    }

    public function modifyAction(Request $request, $blogId = ""){

    }

    public function readAction($blogId){

    }

    public function deleteAction($blogId){

    }

    private function createBlog($requestData){
        $blog = new Blog();
        $blog->setName($requestData['name']);
        $blog->setDescription($requestData['description']);
        $blog->setCreatedBy($this->getUser());

        return $blog;
    }

    private function modifyBlog(){

    }
}