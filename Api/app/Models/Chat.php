<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable  = ['titulo', 'descricao', 'user_id' , 'categoria_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function respostas(){
        return $this->hasMany(Resposta::class);
    }

    public function categoria(){
        return $this->hasOne(Categoria::class);
    }
}
