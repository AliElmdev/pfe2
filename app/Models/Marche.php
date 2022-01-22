<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marche extends Model
{
<<<<<<< HEAD
    public function ctaegoriename()
    {
        return $this->belongsTo('App\Models\Categorie', 'id_categorie', 'id');
=======
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'id_categorie',
        'limit_date',
        'affichage_date',
        'c_charge',
        'etat',
    ];

    public function categorie(){
        return $this->hasOne(\App\Models\Categorie::class);
    }
    public function produit(){
        return $this->hasMany(\App\Models\Produit::class);
>>>>>>> 1bef297d9cc3c0358481614f4ae00a338f631b5b
    }
    public function question(){
        return $this->hasMany(\App\Models\Question::class);
    }
}
