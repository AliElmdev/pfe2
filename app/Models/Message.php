<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'sender_id', 'receiver_id', 'message',
    ];
    public function users()
    {
        return $this->hasOne(\App\Models\User::class);
    }
    public function donneMarche()
    {
        return $this->belongsTo(Marche::class, 'title');
    }
}
