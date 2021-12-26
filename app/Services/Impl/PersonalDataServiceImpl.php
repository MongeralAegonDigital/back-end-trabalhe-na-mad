<?php

namespace App\Services\Impl;

use App\Models\PersonalData;
use App\Services\PersonalDataService;

class PersonalDataServiceImpl implements PersonalDataService
{
    public function create(PersonalData $personal_data)
    {

        $personal_data->save();
    }
}
