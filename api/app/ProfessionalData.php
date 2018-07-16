<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionalData extends Model
{
    protected $fillable = [
        'rg', 
        'number', 
        'issuing_agency',
        'actual_job',
        'profession',
        'gross_income',
        'marital_status_id',
        'work_category_id',
        'client_cpf',
    ];
    public $timestamps = false;
}
