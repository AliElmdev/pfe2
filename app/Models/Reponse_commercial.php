<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse_commercial extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'type',
        'devis',
        'prix',
    ];

    public function reponses_commercial(){
        return $this->belongsTo(\App\Models\Reponses_commercial::class);
    }
}
