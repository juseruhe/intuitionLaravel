<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario_Pregunta extends Model
{
    use HasFactory;

    protected $table = "usuarios_preguntas";

    protected $fillable = [
        'usuario_id','pregunta_id','respuesta'
    ];
}
