<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class B_section extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'type_section',
    ];
    
    public function section(){
        return $this->hasMany(\App\Models\Section::class);
    }
}
