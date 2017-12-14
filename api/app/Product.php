<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'fabrication_date',
        'size',
        'lenght',
        'weight'
    ];

    public function categories() {
        return $this->belongsToMany('App\Category','product_category');
    }
}
