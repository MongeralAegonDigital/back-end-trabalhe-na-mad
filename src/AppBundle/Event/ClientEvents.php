<?php

namespace AppBundle\Event;

/**
 * Client Events.
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class ClientEvents {
    
    /**
     * Event triggered after a client is created.
     */
    const CREATE_CLIENT = 'client.create';
    
    /**
     * Event triggered after a client is updated.
     */
    const UPDATE_CLIENT = 'client.update';
    
    /**
     * Event triggered after a client is deleted.
     */
    const DELETE_CLIENT = 'client.delete';
    
}
