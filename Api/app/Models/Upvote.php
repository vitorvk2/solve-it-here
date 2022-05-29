<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{
    use HasFactory;
    protected $fillable  = ['upvote', 'user_id' , 'resposta_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function resposta(){
        return $this->belongsTo(Resposta::class);
    }
}
