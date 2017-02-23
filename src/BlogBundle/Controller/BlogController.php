<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 2/21/17
 * Time: 3:11 PM
 */

namespace BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends ApiController
{

    public function createAction(Request $request){

    }

    public function modifyAction(Request $request){

    }

    public function readAction($blogId){
        $em = $this->getDoctrine()->getManager();
        $blogRepository = $em->getRepository('BlogBundle:Blog');
        $blog = $blogRepository->findOneBy(['id' => $blogId]);

        if($blog){
            return $this->generateApiResponse($blog->toArray());
        }
        else{
            return $this->generateApiResponse([], Response::HTTP_NOT_FOUND, "That blog does not exist");
        }
    }

    public function deleteAction($blogId){

    }
}