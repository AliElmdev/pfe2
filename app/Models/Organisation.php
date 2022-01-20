<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function departement(){
        return $this->hasMany(\App\Models\departement::class);
    }
    public function user(){
        return $this->hasMany(\App\Models\User::class);
    }
}
