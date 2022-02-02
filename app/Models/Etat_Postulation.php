<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat_Postulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
    ];

    public function postulation(){
        return $this->hasMany(\App\Models\Postulation::class);
    }
}
