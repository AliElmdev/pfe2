<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartementUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'departement_id',
        'user_id',
    ];
    
    public function departement(){
        return $this->hasOne(\App\Models\Departement::class);
    }
    public function user(){
        return $this->hasOne(\App\Models\User::class);
    }
}
