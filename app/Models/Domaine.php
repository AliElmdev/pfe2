<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;
<<<<<<< HEAD
    public function categoriecontrole()
    {
        return $this->belongsTo('App\Models\Categorie');
=======

    protected $fillable = [
        'name',
    ];
    
    public function getDomaineNameAttribute()
    {
        return $this->domaine()->name;  
    }

    public function categorie(){
        return $this->hasMany(Categorie::class);
>>>>>>> 1bef297d9cc3c0358481614f4ae00a338f631b5b
    }
}
