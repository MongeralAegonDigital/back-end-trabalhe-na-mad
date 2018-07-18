<?php

namespace App\Services;

use App\Services\Service;
use App\Address;

/**
 * Responsible for the  business rules of Address
 *
 * @author moreira
 */
class AddressService extends Service {
    
    /**
     * Store a Address resource
     * @param array $data Client's data
     * @return Address The stored object
     */
    public function store(array $data): Client
    {
        return Address::create($data);
        
    }
}
