<?php

namespace App\Services;

/**
 * Description of Service
 *
 * @author moreira
 */
abstract class Service {
    
    /**
     * Format a date to a different format
     * @param string $format Desired format
     */
    public function formatDate($date, string $format = 'Y-m-d') 
    {
        return date($format, strtotime($date));
    }
}
