<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;
    public function categoriecontrole()
    {
        return $this->belongsTo('App\Models\Categorie');
    }
}
