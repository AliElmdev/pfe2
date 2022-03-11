<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_produits',
        'id_marche',
        'id_entreprise',
        'id_postulation',
        'prix',
    ];
}
