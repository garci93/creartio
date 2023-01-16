<x-app-layout>
    <div class="flex justify-center mt-12">
        <a href={{url('/profile/'.$datos_usuario[0]->nombre)}} class="flex mx-auto items-center bg-transparent text-gray-800  p-2 rounded border border-gray-300 hover:bg-gray-100 hover:text-gray-700">Volver al perfil</a>
    </div>
    <div class="container w-full mx-auto flex flex-wrap justify-items-center px-20 py-12">
            @if (empty($publicaciones[0]))
                @if (Auth::user()->id == $datos_usuario[0]->id)
                    <span class="mx-auto text-gray-500 flex align-items-center">¡Ups! Parece que no has añadido ninguna publicación a tu colección.</span>
                @else
                    <span class="mx-auto text-gray-500 flex align-items-center">¡Ups! Parece que este usuario no ha añadido ninguna publicación a su colección.</span>
                @endif
            @endif
        @foreach ($publicaciones as $publicacion)
            <div class="w-1/5 h-56 p-4 my-4 justify-center items-center justify-center justify-items-center">
                    <a class="h-full flex items-center justify-center" href={{url('/publicaciones/'.$publicacion->publicacion_id)}}>
                        <img class="max-h-full flex items-center" src={{Storage::disk('s3')->url('images/'.$publicacion->nombre.'.'.$publicacion->extension)}} alt="">
                    </a>
                <p class="flex justify-center font-bold">{{$publicacion->titulo}}</p>
                <p class="flex justify-center font-bold">{{$datos_usuario[0]->nombre}}</p>
            </div>
        @endforeach
    </div>
    <div class="w-2/12 mx-auto pb-10">
        {{ $publicaciones->links() }}
    </div>

</x-app-layout>
