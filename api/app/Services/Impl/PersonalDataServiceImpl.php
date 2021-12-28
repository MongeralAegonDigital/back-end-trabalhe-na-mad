<?php

namespace App\Services\Impl;

use App\Models\PersonalData;
use App\Services\PersonalDataService;

class PersonalDataServiceImpl implements PersonalDataService
{
    public function create(PersonalData $personal_data) : PersonalData
    {

        $personal_data->save();
        $personal_data->id = $personal_data->id;
        return $personal_data;
    }
}
