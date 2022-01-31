<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse_question extends Model
{
    use HasFactory;

    protected $fillable = [
        'reponse',
        'question_id',
    ];

    public function reponses_question(){
        return $this->belongsTo(\App\Models\Reponses_question::class);
    }
}
