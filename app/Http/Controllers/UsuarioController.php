<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Preguntas;
use App\Models\Usuario_Pregunta;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = Usuario::all();

        return response()->json($usuarios);
       
    }

    public function store(Request $request)
    {

        // consultas bd
        $rol = Rol::where('nombre', 'Usuario')->first();

        $preguntas = Preguntas::all();

        $datos = [
            "rol_id" => $rol["id"],
            "nombre" => $request->input('nombre'),
            "apellido" => $request->input('apellido'),
            "correo" => $request->input('correo'),
            "telefono" => $request->input('telefono'),
            "pais_id" => $request->input('pais_id'),
            "contrasena" => Hash::make($request->input('contrasena')),
            "perfil" => $request->input('perfil_nombre')
        ];

        if ($request->hasFile('perfil')) {

            $datos['perfil'] = $request->file('perfil')->store('perfiles', 'public');
        }

        $usuario = Usuario::insert($datos);

        $usuarioInsertado = Usuario::orderBy('id', 'desc')->first();


        foreach ($preguntas as $pregunta) {

            Usuario_Pregunta::insert([
                "usuario_id" => $usuarioInsertado['id'],
                "pregunta_id" => $pregunta["id"],
                "respuesta" => $request->input('pregunta' . $pregunta["id"])
            ]);
        }

        return response()->json($usuarioInsertado);
    }


    public function loguear(Request $request)
    {

        $usuario = Usuario::where('correo', $request->input('correo'))
            ->first();

        if(!$usuario ){
            return response()->json(0);
        }else if(Hash::check($request->input('contrasena'),$usuario['contrasena'])){
            return response()->json($usuario);
        }else{
            return response()->json(0);
        }
    }


    public function show($id){
     $usuario = Usuario::select('usuarios.nombre as nombre','usuarios.apellido as 
      apellido','paises.nombre as pais',
     'usuarios.perfil as perfil','usuarios.correo as correo','usuarios.telefono as telefono')
     ->join('paises','usuarios.pais_id', '=', 'paises.id','inner')
      ->where('usuarios.id',$id)
     ->first();
     return response()->json($usuario);
    }

    public function mostrar(){

        $usuarios = Usuario::select('usuarios.nombre as nombre','apellido','correo','telefono',
        'paises.nombre as pais','usuarios.id as id','perfil')
        ->join('roles','roles.id','=','usuarios.rol_id','inner')
        ->join('paises','paises.id','=','usuarios.pais_id','inner')
        ->where('roles.nombre','Usuario')
        ->get();

        return response()->json($usuarios);
    }

 
}
