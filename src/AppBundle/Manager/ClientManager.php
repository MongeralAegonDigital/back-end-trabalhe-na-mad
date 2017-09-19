<?php

namespace AppBundle\Manager;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Doctrine\ORM\EntityManager;
use AppBundle\Event\ClientEvent;
use AppBundle\Event\ClientEvents;
use AppBundle\Entity\Client;

/**
 * A ClientManager.
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class ClientManager {
    
    /**
     *
     * @var \Doctrine\ORM\EntityManager 
     */
    private $em;
    
    /**
     *
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    private $ed;
    
    /**
     * 
     * @param \Doctrine\ORM\EntityManager $em
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $ed
     */
    public function __construct(EntityManager $em, EventDispatcherInterface $ed) {
        $this->em = $em;
        $this->ed = $ed;
    }
    
    /**
     * Creates a client.
     * @param \AppBundle\Entity\Client $client
     */
    public function create(Client $client) {
        // persist client
        $this->em->persist($client);
        $this->em->flush();
        
        // dispatch events
        $this->ed->dispatch(
            ClientEvents::CREATE_CLIENT,
            new ClientEvent($client)
        );
    }
    
    /**
     * Updates a client.
     * @param \AppBundle\Entity\Client $client
     */
    public function update(Client $client) {
        // persist client
        $this->em->persist($client);
        $this->em->flush();
        
        // dispatch events
        $this->ed->dispatch(
            ClientEvents::UPDATE_CLIENT,
            new ClientEvent($client)
        );
    }
    
    /**
     * Removes a client.
     * @param \AppBundle\Entity\Client $client
     */
    public function remove(Client $client) {
        // persist client
        $this->em->remove($client);
        $this->em->flush();
        
        // dispatch events
        $this->ed->dispatch(
            ClientEvents::DELETE_CLIENT,
            new ClientEvent($client)
        );
    }
    
}
