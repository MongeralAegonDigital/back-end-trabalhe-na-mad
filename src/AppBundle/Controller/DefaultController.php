<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;

use AppBundle\Entity\Core\Pessoa;

use AppBundle\Util\Enum;


class DefaultController extends Controller
{
      /**
     * @Post("/pessoa")
     */
    public function postPessoaAction(Request $request) {

        try {

            $em = $this->getDoctrine()->getManager();
            
            $pessoa = $this->get('pessoa.service')->cadastrar($request);

            $response = array('status'=>'sucesso');
            
        } catch (\Exception $e) {
            $response = array('status'=>'error', 'msg'=>$e->getMessage());
        }
        
        return new Response(json_encode($response),200);

    }
}
