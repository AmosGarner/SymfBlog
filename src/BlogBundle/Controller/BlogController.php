<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 2/21/17
 * Time: 3:11 PM
 */

namespace BlogBundle\Controller;

use BlogBundle\Entity\Blog;
use DateTime;
use Symfony\Component\HttpFoundation\Request;

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
        $blog->setName($requestData['name']);
        $blog->setDescription($requestData['description']);

        if(isset($requestData['published']))
        {
            $blog->setIsPublished(true);
        }
        else{
            $blog->setIsPublished(false);
        }


        $em->persist($blog);
        $em->flush();

        $response = $this->generateApiResponse('', 200);
        return $this->render('@Blog/Blog/operation.html.twig', array(
            'response' => $response,
        ));
    }

    public function deleteAction($blogId){
        $em = $this->getDoctrine()->getManager();
        $blogRepo = $em->getRepository('BlogBundle:Blog');
        $blog = $blogRepo->findOneBy(['id' => $blogId]);
        $em->remove($blog);
        $em->flush();
        return $this->render('@Blog/Blog/operation.html.twig', array(
            'response' => $this->generateApiResponse(),
        ));
    }

    private function createBlog($requestData){
        $blog = new Blog();
        $blog->setName($requestData['name']);
        $blog->setDescription($requestData['description']);
        $blog->setCreatedBy($this->getUser());

        return $blog;
    }
}