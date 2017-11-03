<?php
namespace App\Events;

use App\Models\User\Data;
use App\Models\User\User;
use App\Models\Address\Address;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CreateUser
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $address;
    private $data;
    private $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Address $address, Data $data)
    {
        $this->user = $user;
        $this->address = $address;
        $this->data = $data;
    }

    public function getUser()
    {
        return $this->user;
    }
    
    public function getAddress()
    {
        return $this->address;
    }
    
    public function getData()
    {
        return $this->data;
    }
}
