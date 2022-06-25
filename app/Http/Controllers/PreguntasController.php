<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Preguntas;

class PreguntasController extends Controller
{
   public function index(){

    $preguntas = Preguntas::all();

    return response()->json($preguntas);
   }

   public function update(Request $request,$id){
    
    Preguntas::find($id)->update($request->all());

    $pregunta = Preguntas::where('id',$id)->first();

    return response()->json($pregunta);
   }
}
