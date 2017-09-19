<?php

namespace AppBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use AppBundle\Entity\Client;
use AppBundle\Form\Type\ClientType;

class ClientController extends ApiController
{
    
    /**
     * @Route(
     *      "/clients.{_format}",
     *      name="api.client.query"
     * )
     * @Method({"GET"})
     * @QueryParam(name="cpf", nullable=true, requirements="^([0-9]{3})\.([0-9]{3})\.([0-9]{3})\-([0-9]{2})$")
     */
    public function queryAction(Request $request, ParamFetcher $paramFetcher)
    {
        $params = $paramFetcher->all(true);
        
        // find clients in database
        $clients = $this->getDoctrine()
            ->getRepository('AppBundle:Client')
            ->findByParams($params);
        
        // return response
        return $this->createJsonResponse($clients);
    }
    
    /**
     * @Route(
     *      "/clients.{_format}",
     *      name="api.client.create",
     *      requirements={ "id" : "\d+" }
     * )
     * @Method({"POST"})
     */
    public function createAction(Request $request)
    {
        // create a new client
        $client = new Client();
        
        // create the form
        $form = $this->createForm(ClientType::class, $client);
        
        // handle form submission
        $formHandler = $this->get('form.client_form_handler');
        if ($formHandler->handleCreate($form, $request)) {
            // return response
            return $this->createJsonResponse(array(
                'client' => $client,
            ), Response::HTTP_CREATED);
        }
        
        // return response
        return $this->createJsonResponse(array(
            'errors' => array(),
        ), Response::HTTP_BAD_REQUEST);
    }
    
    /**
     * @Route(
     *      "/clients/{id}.{_format}",
     *      name="api.client.get",
     *      requirements={ "id" : "\d+" }
     * )
     * @Method({"GET"})
     */
    public function getAction(Client $client, Request $request)
    {
        // return response
        return $this->createJsonResponse($client);
    }
    
    /**
     * @Route(
     *      "/clients/{id}.{_format}",
     *      name="api.client.update",
     *      requirements={ "id" : "\d+" }
     * )
     * @Method({"POST"})
     */
    public function updateAction(Client $client, Request $request)
    {
        // create the form
        $form = $this->createForm(ClientType::class, $client);
        
        // handle form submission
        $formHandler = $this->get('form.client_form_handler');
        if ($formHandler->handleUpdate($form, $request)) {
            // return response
            return $this->createJsonResponse(array(
                'client' => $client,
            ), Response::HTTP_OK);
        }
        
        // return response
        return $this->createJsonResponse(array(
            'errors' => array(),
        ), Response::HTTP_BAD_REQUEST);
    }
    
    /**
     * @Route(
     *      "/clients/{id}.{_format}",
     *      name="api.client.delete",
     *      requirements={ "id" : "\d+" }
     * )
     * @Method({"DELETE"})
     */
    public function deleteAction(Client $client, Request $request)
    {
        if ($request->isMethod('DELETE')) {
            // removes the client
            $manager = $this->get('entity.client_manager');
            $manager->remove($client);
            
            // return response
            return $this->createJsonResponse(array(
                'client' => $client,
            ), Response::HTTP_OK);
        }
        
        // return response
        return $this->createJsonResponse(array(
            'errors' => array(),
        ), Response::HTTP_BAD_REQUEST);
    }
    
}
