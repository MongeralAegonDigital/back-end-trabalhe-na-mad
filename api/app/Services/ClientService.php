<?php

namespace App\Services;

use App\Services\Service;
use App\Client;
use Illuminate\Support\Facades\DB;
/**
 * Responsible for the Client's business rules
 *
 * @author moreira
 */
class ClientService extends Service 
{
    /**
     * Store a Client resource
     * @param array $data Client's data
     * @return Client The stored object
     */
    public function store(array $data): Client
    {
        return DB::transaction(function () use ($data) {
            $data['birthdate'] = $this->formatDate($data['birthdate']);
            $client = Client::create($data);

            if (isset($data['address'])) {
                $client->address()->create($data['address'][0]);
            }

            if (isset($data['phones'])) {
                $client->phones()->createMany($data['phones']);
            }

            if (isset($data['professional_data'])) {
                $client->professionalData()->create($data['professional_data']);
            }
            
            return $client->load('address', 'phones', 'professionalData');
            
        }, 5);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Client::all();
    }
    
}
