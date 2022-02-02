<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'marche_id',
        'questions_id',
        'commercials_id',
        'user_id',
        'etat',
    ];

    public function marche(){
        return $this->hasOne(\App\Models\Marche::class);
    }
    public function reponses_question(){
        return $this->hasOne(\App\Models\Reponses_question::class);
    }
    public function reponses_commercial(){
        return $this->hasOne(\App\Models\Reponses_commercial::class);
    }
    public function user(){
        return $this->hasOne(\App\Models\User::class);
    }
    public function etat_postulation(){
        return $this->hasOne(\App\Models\Etat_Postulation::class);
    }
}
