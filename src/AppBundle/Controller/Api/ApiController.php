<?php

namespace AppBundle\Controller\Api;

use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;

class ApiController extends FOSRestController
{
    
    /**
     * @param mixed $data
     * @param int $status
     * @param array $headers
     * @return Response
     */
    protected function createJsonResponse($data, $status = Response::HTTP_OK, $headers = array())
    {
        $view = $this->view($data, $status, $headers);
        return $this->handleView($view);
    }
    
}
