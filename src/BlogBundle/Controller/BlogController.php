<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 2/21/17
 * Time: 3:11 PM
 */

namespace BlogBundle\Controller;

class BlogController extends ApiController
{
    public function indexAction($blogId){
        return $this->generateApiResponse();
    }
}