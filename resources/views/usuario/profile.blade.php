<x-app-layout>
    <div class="w-1/2 mx-auto container">
            <h2 class="flex justify-center">{{$usuario->nombre}}
                @if ($usuario->rol == 'admin')
                <span class="ml-1 text-gray-500">(Administrador)</span>
                @endif
            </h2>
        <h2 class="flex justify-center"><strong class="mr-1">Correo electrónico:</strong> {{$usuario->email}}</h2>
        <h2 class="flex justify-center"><strong class="mr-1">Nombre completo:</strong> {{$usuario->nom_completo}}</h2>
        <h2 class="flex justify-center"><strong class="mr-1">Biografía:</strong> {{$usuario->biografia}}</h2>
        {{-- TO DO: AVATAR --}}
    </div>
    <div class="w-full flex flex-wrap justify-items-center px-20 py-40">
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
