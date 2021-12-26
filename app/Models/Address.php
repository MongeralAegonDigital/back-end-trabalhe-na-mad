<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'public_area',
        'number',
        'complement',
        'district',
        'city',
        'state',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
