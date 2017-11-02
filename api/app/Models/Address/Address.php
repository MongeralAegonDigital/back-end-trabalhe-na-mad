<?php
namespace App\Models\Address;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'cpf', 'user_cpf');
    }
}
