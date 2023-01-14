<x-app-layout>
    <div class="grid justify-items-center px-40">
        <img class="mx-auto" src="{{Storage::disk('s3')->url('images/'.$publicacion->archivo->nombre.'.'.$publicacion->archivo->extension)}}" alt="profile">
        @auth
                @if (Auth::user()->rol == 'admin' || Auth::user()->id == $publicacion->usuario_id)
                    <span class="inline-block w-1/4 md:hidden font-bold">Acciones</span>
                    <div class="flex">
                        <a href={{url('/publicaciones/'.$publicacion->id.'/edit')}} class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">Editar</a>
                    <form action="/publicaciones/{{ $publicacion->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Estás seguro?')" class="bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-2 rounded" type="submit">Borrar</button>
                    </form>
                    </div>
                @endif
            @endauth

        <h1 class="text-2xl pt-10">{{$datos_publicacion[0]->titulo}}</h1>
        <h1 class="text-xl pt-10">{{$datos_usuario[0]->nombre}}</h1>
        <p class="py-10">{{$datos_publicacion[0]->texto}}</p>
        {{-- <h4>Mostrar comentarios</h4> --}}
        <div class="w-1/2">
            @include('publicacion.mostrarComentarios', ['comentarios' => $publicacion->comentarios, 'publicacion_id' => $publicacion->id])
        </div>
        <hr>
        {{-- <h4>Añadir comentario</h4> --}}

        <form class="w-3/4" method="POST" action="{{ route('comentarios.store'   ) }}">
            @csrf
            <div class="p-2 bg-gray-100 rounded">
                <h4>Puntuación</h4>
                <div class="mb-2 border-2 bg-white border-yellow-200" name="puntos">
                    <input type="radio" id="star1" name="puntos" value=1 />
                    <label class="text-yellow-600 pr-4" for="star1" title="text">★☆☆☆☆</label>
                    <input type="radio" id="star2" name="puntos" value=2 />
                    <label class="text-yellow-600 pr-4" for="star2" title="text">★★☆☆☆</label>
                    <input type="radio" id="star3" name="puntos" value=3 />
                    <label class="text-yellow-600 pr-4" for="star3" title="text">★★★☆☆</label>
                    <input type="radio" id="star4" name="puntos" value=4 />
                    <label class="text-yellow-600 pr-4" for="star4" title="text">★★★★☆</label>
                    <input type="radio" id="star5" name="puntos" value=5 />
                    <label class="text-yellow-600 pr-4" for="star5" title="text">★★★★★</label>
                </div>
                <h4>¿Cuáles son los puntos fuertes?</h4>
                <textarea class="mb-2 border-2 border-cyan-200 border p-2 w-full resize-none" rows="3" name="fortalezas"></textarea>
                <h4>¿Qué consejos le darías al autor?</h4>
                <textarea class="border-2 border-fuchsia-200 border p-2 w-full resize-none" rows="3" name="consejos"></textarea>
                <input type="hidden" name="publicacion_id" value="{{ $publicacion->id }}" />
                <input type="hidden" name="usuario_id" value="{{ auth()->user()->id }}" />
            </div>
            <div class="flex justify-center mx-auto my-6">
                <input type="submit" class="justify-self-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded" value="Añadir comentario" />
            </div>
        </form>
    </div>
</x-app-layout>
