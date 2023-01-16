<x-app-layout>
    <div class="flex justify-center mt-12">
        <a href={{url('/profile/'.$usuario->nombre)}} class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">Volver al perfil</a>
    </div>
    <div class="container w-full mx-auto flex flex-wrap justify-items-center px-20 py-12">
         {{-- {{dd($publicaciones)}} --}}
            @if (empty($publicaciones[0]))
                @if (Auth::user()->id == $usuario->id)
                    <span class="mx-auto text-gray-500 flex align-items-center">¡Ups! Parece que no has añadido ninguna publicación a tu colección.</span>
                @else
                    <span class="mx-auto text-gray-500 flex align-items-center">¡Ups! Parece que este usuario no ha añadido ninguna publicación a su colección.</span>
                @endif
            @endif
        @foreach ($publicaciones as $publicacion)
            <div class="w-1/5 h-56 p-4 my-4 justify-center items-center justify-center justify-items-center">
                    <a class="h-full flex items-center justify-center" href={{url('/publicaciones/'.$publicacion->id)}}>
                        <img class="max-h-full flex items-center" src={{Storage::disk('s3')->url('images/'.$publicacion->nombre.'.'.$publicacion->extension)}} alt="">
                    </a>
                <p class="flex justify-center font-bold">{{$publicacion->titulo}}</p>
            </div>
        @endforeach
    </div>
    <div class="w-2/12 mx-auto pb-10">
        {{ $publicaciones->links() }}
    </div>

</x-app-layout>
