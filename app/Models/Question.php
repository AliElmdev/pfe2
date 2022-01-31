<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'options',
        'description',
        'type',
        'section_id',
        'marche_id',
    ];

    public function marche(){
        return $this->hasMany(\App\Models\Marche::class);
    }
    public function question(){
        return $this->hasOne(\App\Models\Section::class);
    }
    public function section(){
        return $this->belongsTo(\App\Models\Section::class);
    }
}
