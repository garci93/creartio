<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Publicacion;
use Carbon\Carbon;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicacionController extends Controller
{
    public function create()
    {
        return view("publicacion.create");
    }

    public function index(){
        $publicaciones = Publicacion::orderBy('id','desc')->simplePaginate(10);
        return view('publicacion.index',['publicaciones' => $publicaciones]);
    }

    public function edit($id){
        $publicacion = Publicacion::findOrFail($id);
        $datos_publicacion = DB::table('publicaciones')
            ->select('titulo','texto')
            ->where('id','=',$publicacion->id)
            ->get();
        return view('publicacion.edit',['publicacion' => $publicacion,'datos_publicacion' => $datos_publicacion]);
    }

    public function update(Request $request,$id){
        $datos_publicacion = request()->except(['_token','_method']);
        Publicacion::where('id','=',$id)->update($datos_publicacion,['fecha_ultima_edicion' => Carbon::now()]);
        return redirect('/publicaciones')->with('success','Se ha modificado la publicación correctamente.');
    }

    public function destroy($id){
        Publicacion::destroy($id);
        return redirect('/publicaciones')->with('success','Se ha borrado la publicación correctamente.');
    }

    public function store(Request $request){
        $publicacion = new Publicacion($request->input());
        $nombre_nuevo = Auth::user()->nombre . "-" . $publicacion->titulo;
        DB::table('archivos')
            ->insert(
                ['nombre' => $nombre_nuevo,
                'extension' => $request->image->extension(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()]);
        $archivo_id = DB::table('archivos')
            ->select('id')
            ->where('nombre','=',$nombre_nuevo)
            ->get();
        app('App\Http\Controllers\ImageUploadController')->imageUploadPost($request,$nombre_nuevo);
        DB::table('publicaciones')
            ->insert(
                ['titulo' => $publicacion->titulo,
                'texto' => $publicacion->texto,
                'usuario_id' => $publicacion->usuario_id,
                'archivo_id' => $archivo_id[0]->id,
                'fecha_publicacion' => Carbon::now(),
                'fecha_ultima_edicion' => Carbon::now()]);
        return redirect('/publicaciones')->with(["mensaje" => "Publicación creada",]);
    }

    public function show($id){
        $publicacion = Publicacion::with('archivo')->findOrFail($id);
        $datos_publicacion = DB::table('publicaciones')
            ->select('titulo','texto','usuario_id')
            ->where('id','=',$publicacion->id)
            ->get();
        $datos_usuario = DB::table('users')
            ->select('nombre')
            ->where('id','=',$publicacion->usuario_id)
            ->get();
        $comentarios = DB::table('comentarios')
            ->select('puntos','fortalezas','consejos','usuario_id')
            ->where('publicacion_id','=',$publicacion->id)
            ->get();
        $esta_en_coleccion = DB::table('colecciones')
        ->where('usuario_id','=',Auth::user()->id)
        ->where('publicacion_id','=',$id)
        ->exists();
        return view('publicacion.show',['publicacion' => $publicacion,
            'datos_publicacion' => $datos_publicacion,'datos_usuario' => $datos_usuario, 'comentarios' => $comentarios,'esta_en_coleccion' => $esta_en_coleccion]);
    }
}
