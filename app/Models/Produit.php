<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'commentaire',
        'qte',
        'unit',
        'serv_prod',
        'marche_id',
    ];

    public function marche(){
        return $this->belongsTo(\App\Models\Marche::class);
    }
}
