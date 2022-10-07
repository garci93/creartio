<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Finder\Finder;

class ReporteController extends Controller
{
    public function create()
    {
        return view("reporte.create");
    }

    public function index(){

        //select u.nombre, r.razon, r.reportado_id
        //from users u join reportes r on u.id = r.reportado_id;



        $reportes = DB::table('users')
            ->select('users.nombre','reportes.id','reportes.razon','reportes.reportador_id','reportes.reportado_id')
            ->join('reportes','users.id','=','reportes.reportado_id')
            ->join('reportes','users.id','=','reportes.reportador_id') //terminar esta consulta para poder coger el nombre del reportador
            ->paginate(10);
        return view('reporte.index',['reportes' => $reportes]);
    }

    public function edit($id){
        $reporte = Reporte::findOrFail($id);
        $datos_reporte = DB::table('reportes')
            ->select('reportador_id,reportado_id,razon')
            ->where('id','=',$reporte->id)
            ->get();
        return view('reporte.edit',['reporte' => $reporte,'datos_reporte' => $datos_reporte]);
    }

    public function update(Request $request,$id){
        $datos_reporte = request()->except(['_token','_method']);
        Reporte::where('id','=',$id)->update($datos_reporte);
        return redirect('/reportes')->with('success','Se ha modificado el reporte correctamente.');
    }

    public function destroy($id){
        Reporte::destroy($id);
        return redirect('/reportes')->with('success','Se ha borrado el reporte correctamente.');
    }

    public function store(Request $request){
        $reporte = request()->except('_token');
        $reportado_id = DB::table('users')
            ->select('id')
            ->where(['nombre' => $reporte["nombre"]])
            ->get();
        DB::table('reportes')
            ->insert(
                ['reportador_id' => Auth::user()->id,
                'reportado_id' => $reportado_id[0]->id,
                'razon' => $reporte["razon"],
                'created_at' => Carbon::now()]);
        return redirect('/reportes')->with(["mensaje" => "Reporte creado",]);
    }
}
