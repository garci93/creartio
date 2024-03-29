<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = User::simplePaginate(10);
        return view('usuario.index',['usuarios' => $usuarios]);
    }

    public function show($nombre)
    {
        return view('usuario.profile', [
            'usuarios' => User::findOrFail($nombre)
        ]);
    }

    public function profile (Request $request, $nombre)
    {
        $usuario=User::where('nombre','=',$nombre)->first();
        $publicaciones=DB::table('publicaciones')
        ->join('archivos','publicaciones.archivo_id','=','archivos.id')
        ->where('usuario_id','=',$usuario->id)
        ->simplePaginate(10);
        if (isset($usuario))
        {
            return view('usuario.profile',['usuario' => $usuario,'publicaciones' => $publicaciones]);
        }
        return redirect('/')->with('danger','Usuario no encontrado');
    }

    public function edit($id){
        $usuario = User::findOrFail($id);
        $datos_usuario = DB::table('users')
            ->select('nombre','email','rol','nom_completo','biografia','idioma')
            ->where('id','=',$usuario->id)
            ->get();
        return view('usuario.edit',['usuario' => $usuario,'datos_usuario' => $datos_usuario]);
    }

    public function update(Request $request,$id){
        $datos_usuario = request()->except(['_token','_method']);
        User::where('id','=',$id)->update($datos_usuario);
        return redirect('/usuarios')->with('success','Se ha modificado el usuario correctamente.');
    }

    public function destroy($id){
        User::destroy($id);
        return redirect('/usuarios')->with('success','Se ha borrado el usuario correctamente.');
    }
}
