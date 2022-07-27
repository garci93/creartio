<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = User::paginate(10);
        return view('usuario.index',['usuarios' => $usuarios]);
    }
}
