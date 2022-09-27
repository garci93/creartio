<?php

namespace App\Http\Controllers;

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
        $colecciones = Coleccion::paginate(10);
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
        return redirect('/colecciones')->with('success','Se ha borrado la colección correctamente.');
    }

    public function store(Request $request){
        $coleccion = new Coleccion($request->input());
        DB::table('colecciones')
            ->insert(
                ['titulo' => $coleccion->titulo,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()]);
        return redirect('/colecciones')->with(["mensaje" => "Colección creada",]);
    }
}
