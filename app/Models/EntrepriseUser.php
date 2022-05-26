<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntrepriseUser extends Model
{
    use HasFactory;


    protected $fillable = [
        'role',
    ];

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
    public function Entreprise(){
        return $this->belongsTo(\App\Models\Entreprise::class);
    }
}
