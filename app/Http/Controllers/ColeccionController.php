<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Publicacion;
use App\Models\Coleccion;
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
        $colecciones = Coleccion::orderBy('id','desc')->simplePaginate(5);
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
        Coleccion::destroy($id);
        return redirect('/colecciones')->with('success','Se ha quitado esta publicación de tu colección.');
    }

    public function store(Request $request){
        $publicacion = new Publicacion($request->input());
        $nombre_nuevo = Auth::user()->nombre . "-" . $publicacion->titulo;
        DB::table('archivos')
            ->insert(
                ['nombre' => $nombre_nuevo,
                'extension' => $request->image->extension(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),]);
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
        $colecciones = DB::table('colecciones')
            ->where('publicacion_id','=',$publicacion->id)
            ->get();
        return view('publicacion.show',['publicacion' => $publicacion,'datos_publicacion' => $datos_publicacion,'datos_usuario' => $datos_usuario, 'colecciones' => $colecciones]);
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
