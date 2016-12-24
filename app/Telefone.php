<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = ['titulo','telefone'];
    
    public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    }
}
