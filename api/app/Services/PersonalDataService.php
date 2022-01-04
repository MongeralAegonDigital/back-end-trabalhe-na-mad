<?php

namespace App\Services;

use App\Models\PersonalData;

interface PersonalDataService
{

    public function create(PersonalData $personalData) : PersonalData;
}
