<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario_Pregunta;

class UsuarioPreguntaContoller extends Controller
{
    public function respuestas($id){
    $usuario_preguntas = Usuario_Pregunta::select('preguntas.nombre as pregunta','respuesta')
    ->join('preguntas','preguntas.id','=','usuarios_preguntas.pregunta_id')
    ->where('usuarios_preguntas.usuario_id',$id)
    ->get();

    return response()->json($usuario_preguntas);
    }
}
