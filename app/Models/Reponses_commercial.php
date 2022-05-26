<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponses_commercial extends Model
{
    use HasFactory;

    public function reponse_commercial(){
        return $this->hasMany(\App\Models\Reponse_commercial::class);
    }
    public function postulation(){
        return $this->belongsTo(\App\Models\Postulation::class);
    }
}
