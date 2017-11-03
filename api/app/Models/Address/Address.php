<?php
namespace App\Models\Address;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_cpf', 'cep', 'street', 'number', 'address2', 'neighbor', 'city', 'state'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'cpf', 'user_cpf');
    }
}
