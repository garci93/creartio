<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Publicacion;
use App\Models\Coleccion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ColeccionController extends Controller
{
    public function create()
    {
        return view("coleccion.create");
    }

    public function index(){
        $colecciones = Coleccion::orderBy('id','desc')->simplePaginate(10);
        return view('coleccion.index',['colecciones' => $colecciones]);
    }

    public function edit($id){
        $coleccion = Coleccion::findOrFail($id);
        $datos_coleccion = DB::table('colecciones')
            ->select('titulo')
            ->where('id','=',$coleccion->id)
            ->get();
        return view('coleccion.edit',['coleccion' => $coleccion,'datos_coleccion' => $datos_coleccion]);
    }

    public function update(Request $request,$id){
        $datos_coleccion = request()->except(['_token','_method']);
        Coleccion::where('id','=',$id)->update($datos_coleccion);
        return redirect('/colecciones')->with('success','Se ha modificado la colección correctamente.');
    }

    public function destroy($id){
        $coleccion = Coleccion::where('publicacion_id','=',$id)->where('usuario_id','=',Auth::user()->id)->get();
        Coleccion::destroy($coleccion[0]->id);
        return redirect()->back()->with('success','Se ha quitado esta publicación de tu colección.');
    }

    public function store(Request $request){
        $publicacion_id = $request->publicacion_id;
        DB::table('colecciones')
            ->insert(
                ['usuario_id' => Auth::user()->id,
                'publicacion_id' => $publicacion_id]);
        return redirect()->back()->with(["mensaje" => "Publicación creada"]);
    }

    public function show($nombre){
        $usuario = DB::table('users')->where('nombre','=',$nombre)->get();
        $publicacion = Publicacion::with('archivo')->findOrFail($usuario[0]->id);
        $publicaciones=DB::table('publicaciones')
        ->join('archivos','publicaciones.archivo_id','=','archivos.id')
        ->join('colecciones','publicaciones.id','=','colecciones.publicacion_id')
        ->where('colecciones.usuario_id','=',$usuario[0]->id)
        ->simplePaginate(10);
        $datos_publicacion = DB::table('publicaciones')
            ->select('titulo','texto','usuario_id')
            ->where('id','=',$publicacion->id)
            ->get();
        $datos_usuario = DB::table('users')
            ->select('id','nombre')
            ->where('id','=',$publicacion->usuario_id)
            ->get();
        $colecciones = DB::table('colecciones')
            ->where('publicacion_id','=',$publicacion->id)
            ->get();
        return view('usuario.coleccion',['nombre' => $nombre,'publicaciones' => $publicaciones,'datos_publicacion' => $datos_publicacion,'datos_usuario' => $datos_usuario, 'colecciones' => $colecciones]);
    }

    // public function store(Request $request){
    //     $coleccion = new Coleccion($request->input());
    //     DB::table('colecciones')
    //         ->insert(
    //             ['titulo' => $coleccion->titulo,
    //             'user_id' => Auth::user()->id,
    //             'created_at' => Carbon::now()]);
    //     return redirect('/colecciones')->with(["mensaje" => "Colección creada",]);
    // }
}
