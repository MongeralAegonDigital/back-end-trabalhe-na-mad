<?php

namespace App\Services\Impl;

use App\Models\Address;
use App\Models\PersonalData;
use App\Models\User;
use App\Services\AddressService;
use App\Services\PersonalDataService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;

class UserServiceImpl implements UserService
{
    private $addressService;
    private $personalDataService;

    public function __construct(AddressService $addressService, PersonalDataService $personalDataService)
    {
        $this->addressService = $addressService;
        $this->personalDataService = $personalDataService;
    }

    public function getAll()
    {
        return User::all();
    }

    public function create(array $array)
    {
        DB::transaction(function () use ($array) {
            $user = new User($array);
            $user->save();

            $address = new Address($array['address']);
            $address->user()->associate($user);
            $this->addressService->create($address);

            $personal_data = new PersonalData($array['personal_data']);
            $personal_data->user()->associate($user);
            $this->personalDataService->create($personal_data);
        });
    }
}
