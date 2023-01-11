<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request)

    {
    	$request->validate([
            'puntos'=>'required',
            'fortalezas'=>'required',
            'consejos'=>'required',
        ]);

        $input = $request->all();
        $input['usuario_id'] = auth()->user()->id;

        Comentario::create($input);

        return back();
    }
}
