<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nom_section',
        'type_section',
    ];
    
    public function question(){
        return $this->hasMany(\App\Models\Question::class);
    }
    public function b_section(){
        return $this->belongsTo(\App\Models\B_section::class);
    }
}

