<?php

namespace AppBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class ZipToAddressController extends ApiController
{
    
    /**
     * @Route(
     *      "/zip-to-address/{zipCode}.{_format}",
     *      name="api.geolocation.zip_code",
     *      requirements={ "zipCode" : "[0-9]{5}\-[0-9]{3}" }
     * )
     * @Method({"GET"})
     */
    public function queryAction($zipCode, Request $request)
    {
        // convert zipCode to address
        $zipToAddressService = $this->get('util.zip_to_address');
        $address = $zipToAddressService->getAddress($zipCode);
        
        // return response
        return $this->createJsonResponse($address);
    }
    
}
