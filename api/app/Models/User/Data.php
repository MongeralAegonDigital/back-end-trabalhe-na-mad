<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'user_data';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_cpf', 'rg', 'date_expedition', 'org', 'marital_status', 'category', 'company', 'occupation', 'salary'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'cpf', 'user_cpf');
    }
}
