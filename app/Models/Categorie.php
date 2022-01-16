<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Domaine;

class Categorie extends Model
{
    use HasFactory;
    public function domainecontrole()
    {
        return $this->hasOne('App\Models\Domaine');
    }
}
