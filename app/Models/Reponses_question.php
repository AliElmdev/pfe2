<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponses_question extends Model
{
    use HasFactory;

    public function reponse_question(){
        return $this->hasMany(\App\Models\Reponse_question::class);
    }
    public function postulation(){
        return $this->belongsTo(\App\Models\Postulation::class);
    }
}
