<x-app-layout>
    <div class="grid justify-items-center px-40">
        <img class="mx-auto" src="{{Storage::disk('s3')->url('images/'.$publicacion->archivo->nombre.'.'.$publicacion->archivo->extension)}}" alt="profile">
        <span class="inline-block w-1/4 md:hidden font-bold">Acciones</span>
					<div class="flex">
                        <a href={{url('/publicaciones/'.$publicacion->id.'/edit')}} class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">Editar</a>
					<form action="/publicaciones/{{ $publicacion->id }}" method="POST">
						@csrf
						@method('DELETE')
						<button onclick="return confirm('¿Estás seguro?')" class="bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-2 rounded" type="submit">Borrar</button>
				    </form>
                    </div>
        <h1 class="text-2xl pt-10">{{$datos_publicacion[0]->titulo}}</h1>
        <p class="py-10">{{$datos_publicacion[0]->texto}}</p>
        <h4>Display Comments</h4>

                    @include('publicacion.mostrarComentarios', ['comentarios' => $publicacion->comentarios, 'publicacion_id' => $publicacion->id])
                    <hr>
                    <h4>Añadir comentario</h4>

                    <form method="POST" action="{{ route('comentarios.store'   ) }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body"></textarea>
                            <input type="hidden" name="publicacion_id" value="{{ $publicacion->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
    </div>
</x-app-layout>
