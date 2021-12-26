<?php

namespace App\Services\Impl;

use App\Mail\SendMailUser;
use App\Models\PersonalData;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Support\Facades\Mail;

class EmailServiceImpl implements EmailService
{
    public function sendEmail(User $user)
    {
        Mail::to($user->email)
            ->send(new SendMailUser($user));
    }
}
