<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function marche(){
        return $this->belongsTo(Marche::class);
    }

    public function domaine(){
        return $this->belongsTo(Domaine::class);
    }
}
