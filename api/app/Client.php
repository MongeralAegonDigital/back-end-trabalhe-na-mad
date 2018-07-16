<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'cpf';
    protected $fillable = ['cpf', 'name', 'password', 'birthdate', 'email'];
    public $timestamps = false;

    public function phones()
    {
        return $this->hasMany(Phone::class, 'client_cpf');
    }
    
    public function address()
    {
        return $this->hasOne(Address::class);
    }
    
    public function professionalData()
    {
        return $this->hasOne(ProfessionalData::class);
    }
    
    protected static function boot() {
        parent::boot();

        static::deleting(function($client) {
             $client->phones()->delete();
             $client->address()->delete();
             $client->professionalData()->delete();
        });
    }
}
