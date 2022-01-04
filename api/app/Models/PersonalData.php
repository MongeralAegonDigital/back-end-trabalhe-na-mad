<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;

    protected $fillable = [
        'RG',
        'number',
        'ship_date',
        'issuing_body',
        'marital_status',
        'category_id',
        'company',
        'profession',
        'salary',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
