<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'title',
        'service_title',
        'phone',
        'lang',
    ];

    public $guarded=[];

    public function user(){
        return $this->belongsTo('User');
    }

    use HasFactory;
}
