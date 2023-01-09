<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Carbon\Carbon;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicacionController extends Controller
{
    public function create()
    {
        return view("publicacion.create");
    }

    public function index(){
        $publicaciones = Publicacion::paginate(10);
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
        dd($request->image);
        DB::table('publicaciones')
            ->insert(
                ['titulo' => $publicacion->titulo,
                'texto' => $publicacion->texto,
                'fecha_publicacion' => Carbon::now()]);
        return redirect('/publicaciones')->with(["mensaje" => "Publicación creada",]);
    }

    public function show($id){
        $publicacion = Publicacion::with('archivo')->findOrFail($id);
        $datos_publicacion = DB::table('publicaciones')
            ->select('titulo','texto')
            ->where('id','=',$publicacion->id)
            ->get();
        return view('publicacion.show',['publicacion' => $publicacion,'datos_publicacion' => $datos_publicacion]);
    }
}
