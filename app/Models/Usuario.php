<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

   protected $table = "usuarios";

    protected $fillable = [
        'nombre', 'apellido', 'rol_id', 'pais_id', 'telefono', 'correo',
        'contrasena', 'perfil'
    ];
}
