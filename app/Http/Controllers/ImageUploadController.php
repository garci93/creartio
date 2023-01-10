<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\String_;

class ImageUploadController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request, String $nombre_nuevo)
    {
        $customMessages = [
            'required' => 'No se ha subido ningún archivo.',
            'image' => 'El archivo debe ser una imagen.',
            'mimes' => 'El archivo debe ser uno de los siguientes formatos: JPEG, PNG, JPG, GIF, SVG.',
        ];
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $customMessages);

        $datos_usuario = DB::table('users')
            ->select('nombre')
            ->where('id','=',Auth::user()->id)
            ->get();

        // $datos_publicacion = DB::table('publicaciones')
        //     ->select('titulo')


        $imageNameOld = time().'.'.$request->image->extension();
        $imageNameNew = $nombre_nuevo.'.'.$request->image->extension();
        $path = Storage::disk('s3')->put('images', $request->image);
        Storage::disk('s3')->move($path, 'images/'.$imageNameNew);

        /* Store $imageName name in DATABASE from HERE */

        return back()
            ->with('success','Archivo subido correctamente.')
            ->with('image', $path);
    }

}
