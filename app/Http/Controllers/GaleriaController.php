<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GaleriaController extends Controller
{
    public function create()
    {
        return view("galeria.create");
    }

    public function index(){
        $galerias = Galeria::paginate(10);
        return view('galeria.index',['galerias' => $galerias]);
    }

    public function edit($id){
        $galeria = Galeria::findOrFail($id);
        $datos_galeria = DB::table('galerias')
            ->select('titulo')
            ->where('id','=',$galeria->id)
            ->get();
        return view('galeria.edit',['galeria' => $galeria,'datos_galeria' => $datos_galeria]);
    }

    public function update(Request $request,$id){
        $datos_galeria = request()->except(['_token','_method']);
        Galeria::where('id','=',$id)->update($datos_galeria);
        return redirect('/galerias')->with('success','Se ha modificado la galería correctamente.');
    }

    public function destroy($id){
        Galeria::destroy($id);
        return redirect('/galerias')->with('success','Se ha borrado la galería correctamente.');
    }

    public function store(Request $request){
        $galeria = new Galeria($request->input());
        DB::table('galerias')
            ->insert(
                ['titulo' => $galeria->titulo,
                'usuario_id' => Auth::user()->id,
                'created_at' => Carbon::now()]);
        return redirect('/galerias')->with(["mensaje" => "Galería creada",]);
    }
}
