<?php

namespace App\Services\Impl;

use App\Models\Address;
use App\Models\PersonalData;
use App\Models\User;
use App\Services\AddressService;
use App\Services\EmailService;
use App\Services\PersonalDataService;
use App\Services\UserService;
use App\Utils\CpfValidation;
use Illuminate\Support\Facades\DB;

class UserServiceImpl implements UserService
{
    private $addressService;
    private $personalDataService;
    private $emailService;

    public function __construct(
        AddressService $addressService,
        PersonalDataService $personalDataService,
        EmailService $emailService
    ) {
        $this->addressService = $addressService;
        $this->personalDataService = $personalDataService;
        $this->emailService = $emailService;
    }

    public function getAll()
    {
        return User::with(['address','personalData'])->get();
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

            $this->emailService->sendEmail($user);
        });
    }

    public function emailIsUnique($email): bool
    {
        return DB::table('users')->where('email', $email)->doesntExist();
    }

    public function cpfIsValid(string $cpf): bool
    {
        $cpfValidate = new CpfValidation();
        return $cpfValidate->validate(null, $cpf, null, null);
    }
}
