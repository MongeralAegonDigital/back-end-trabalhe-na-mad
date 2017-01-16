<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    
    /**
     * @Route("/", name="app.index.index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('App/Index/index.html.twig');
    }
    
}
