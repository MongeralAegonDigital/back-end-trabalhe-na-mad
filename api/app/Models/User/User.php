<?php
namespace App\Models\User;

use App\Models\Address\Address;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'cpf';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf', 'name', 'email', 'password', 'phone', 'email', 'date_birth'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function data()
    {
        return $this->hasOne(Data::class, 'user_cpf', 'cpf');
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'user_cpf', 'cpf');
    }
}
