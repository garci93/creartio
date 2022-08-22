<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicacionController extends Controller
{
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
        Publicacion::where('id','=',$id)->update($datos_publicacion);
        return redirect('/publicaciones')->with('success','Se ha modificado la publicación correctamente.');
    }

    public function destroy($id){
        Publicacion::destroy($id);
        return redirect('/publicaciones')->with('success','Se ha borrado la publicación correctamente.');
    }
}
