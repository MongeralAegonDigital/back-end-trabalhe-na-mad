<?php

namespace AppBundle\Form\Handler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use AppBundle\Manager\ClientManager;

/**
 * 
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class ClientFormHandler {
    
    /**
     *
     * @var \AppBundle\Manager\ClientManager
     */
    private $manager;
    
    /**
     * 
     * @param \AppBundle\Manager\ClientManager $manager
     */
    public function __construct(ClientManager $manager) {
        $this->manager = $manager;
    }
    
    /**
     * 
     * @param \Symfony\Component\Form\FormInterface $form
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return boolean
     */
    public function handleCreate(FormInterface $form, Request $request) {
        if (!$request->isMethod('POST')) {
            return false;
        }
        
        $form->handleRequest($request);
        if (!($form->isSubmitted() && $form->isValid())) {
            return false;
        }
        
        $client = $form->getData();
        $this->manager->create($client);
        
        return true;
    }
    
    /**
     * 
     * @param \Symfony\Component\Form\FormInterface $form
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return boolean
     */
    public function handleUpdate(FormInterface $form, Request $request) {
        if (!$request->isMethod('POST')) {
            return false;
        }
        
        $form->handleRequest($request);
        if (!($form->isSubmitted() && $form->isValid())) {
            return false;
        }
        
        $client = $form->getData();
        $this->manager->update($client);
        
        return true;
    }
    
}
