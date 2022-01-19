<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Domaine;

class Categorie extends Model
{
    use HasFactory;
<<<<<<< HEAD
    public function domainecontrole()
    {
        return $this->hasOne('App\Models\Domaine');
=======

    protected $fillable = [
        'name',
    ];

    public function marche(){
        return $this->belongsTo(Marche::class);
    }

    public function domaine(){
        return $this->belongsTo(Domaine::class);
>>>>>>> 1bef297d9cc3c0358481614f4ae00a338f631b5b
    }
}
