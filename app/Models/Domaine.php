<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    
    public function getDomaineNameAttribute()
    {
        return $this->domaine()->name;  
    }

    public function categorie(){
        return $this->hasMany(Categorie::class);
    }
}
