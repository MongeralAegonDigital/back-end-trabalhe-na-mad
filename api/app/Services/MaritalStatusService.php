<?php

namespace App\Services;

use App\Services\Service;
use App\MaritalStatus;

/**
 * Responsible for the  business rules of Marital Status
 *
 * @author moreira
 */
class MaritalStatusService extends Service {
    
    /**
     * List MaritalStatus resources
     * @return Collection
     */
    public function index()
    {
        return MaritalStatus::all();
        
    }
}
