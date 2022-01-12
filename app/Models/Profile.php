<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'title',
        'title_service',
        'phone_user',
        'lang_user',
    ];

    public $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
