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
use Symfony\Component\Validator\Constraints\DateTime;

class BlogController extends ApiController
{

    public function createAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $requestData = $request->request->all()['blog_create_form'];

        $blog = $this->createBlog($requestData);
        $em->persist($blog);
        $em->flush();

        $response = $this->generateApiResponse('', 200);

        return $this->render('@Blog/Blog/operation.html.twig', array(
            'response' => $response,
        ));
    }

    public function modifyAction(Request $request, $blogId){
        $em = $this->getDoctrine()->getManager();
        $blogRepo = $em->getRepository('BlogBundle:Blog');
        $requestData = $request->request->all()['blog_edit_form'];

        $blog = $blogRepo->findOneBy(['id' => $blogId]);

        $blog->setLastUpdatedDate(new DateTime());


        $response = $this->generateApiResponse('', 200);

        return $this->render('@Blog/Blog/operation.html.twig', array(
            'response' => $response,
        ));
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
}