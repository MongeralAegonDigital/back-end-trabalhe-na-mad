<?php
namespace App\Mail;

use App\Models\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('4c6391864f-d3da07@inbox.mailtrap.io')
        ->subject('Teste Mongeral | Bruno Roboredo')
        ->view('user.mail.created');
    }
}
