<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 2/21/17
 * Time: 3:06 PM
 */

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function invalidAction(){
        return $this->generateApiResponse([], Response::HTTP_NOT_FOUND, "That is not a valid API action");
    }

    public function generateApiResponse($data = [], $statusCode = 200, $statusMessage = ""){
        $response = [
            "message" => $statusMessage,
            "payload" => $data
        ];
        return $this->json($response, $statusCode);
    }
}