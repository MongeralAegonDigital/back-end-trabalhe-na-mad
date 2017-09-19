<?php

namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use AppBundle\Entity\Client;

/**
 * A client event.
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class ClientEvent extends Event {
    
    /**
     * A client.
     * @var \AppBundle\Entity\Client 
     */
    private $client;
    
    /**
     * Constructs a ClientEvent.
     * @param \EntityBundle\Entity\Client  $client
     */
    public function __construct(Client $client) {
        $this->client = $client;
    }
    
    /**
     * Returns the Client.
     * @return \EntityBundle\Entity\Client
     */
    public function getClient() {
        return $this->client;
    }
    
}
