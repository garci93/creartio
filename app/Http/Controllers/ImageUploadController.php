<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function imageUploadPost(Request $request)
    {
        $customMessages = [
            'required' => 'No se ha subido ningún archivo.',
            'image' => 'El archivo debe ser una imagen.',
            'mimes' => 'El archivo debe ser uno de los siguientes formatos: JPEG, PNG, JPG, GIF, SVG.',
        ];
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $customMessages);

        $imageName = time().'.'.$request->image->extension();

        $path = Storage::disk('s3')->put('images', $request->image);
        $path = Storage::disk('s3')->url($path);

        /* Store $imageName name in DATABASE from HERE */

        return back()
            ->with('success','Archivo subido correctamente.')
            ->with('image', $path);
    }

}
