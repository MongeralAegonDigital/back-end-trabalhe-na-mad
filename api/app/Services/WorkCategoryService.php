<?php

namespace App\Services;

use App\Services\Service;
use App\WorkCategory;

/**
 * Responsible for the  business rules of Marital Status
 *
 * @author moreira
 */
class WorkCategoryService extends Service {
    
    /**
     * List MaritalStatus resources
     * @return Collection
     */
    public function index()
    {
        return WorkCategory::all();
    }
}
