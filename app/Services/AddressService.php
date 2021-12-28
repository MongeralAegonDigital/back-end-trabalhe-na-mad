<?php

namespace App\Services;

use App\Models\Address;

interface AddressService
{

    public function create(Address $address): Address;
}
