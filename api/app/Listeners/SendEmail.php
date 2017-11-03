<?php
namespace App\Listeners;

use App\Events\CreateUser;
use App\Mail\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmail
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CreateUser $event)
    {
        $user = $event->getUser();
        Mail::to($user)->send(new UserCreated());
    }
}
