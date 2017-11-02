<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'user_data';

    public function user()
    {
        return $this->belongsTo(User::class, 'cpf', 'user_cpf');
    }
}
