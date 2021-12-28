<?php

namespace App\Services;

use App\Models\User;

interface EmailService
{

    public function sendEmail(User $user);
}