<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];
    
    public function organisation(){
        return $this->hasOne(\App\Models\Organisation::class);
    }
    public function user(){
        return $this->hasMany(\App\Models\User::class);
    }
}
