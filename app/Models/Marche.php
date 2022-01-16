<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marche extends Model
{
    public function ctaegoriename()
    {
        return $this->belongsTo('App\Models\Categorie', 'id_categorie', 'id');
    }
}
