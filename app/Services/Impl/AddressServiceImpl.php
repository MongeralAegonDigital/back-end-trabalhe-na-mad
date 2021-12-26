<?php

namespace App\Services\Impl;

use App\Models\Address;
use App\Services\AddressService;

class AddressServiceImpl implements AddressService
{
    public function create(Address $address)
    {

        $address->save();
    }
}
