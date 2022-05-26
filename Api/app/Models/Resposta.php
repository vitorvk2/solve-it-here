<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;
    protected $filleable = ['resposta', 'upvote', 'user_id' , 'chat_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function chat(){
        return $this->hasOne(Chat::class);
    }
}
