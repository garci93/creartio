<x-app-layout>
    <div>
        <input type="text" name="titulo" value="{{$datos_publicacion[0]->titulo}}">
        <label for="titulo">Título</label>
        <input type="text" name="texto" value="{{$datos_publicacion[0]->texto}}">
        <label for="texto">Texto</label>
        <img class="w-1/2 mx-auto" src="{{Storage::disk('s3')->url('images/'.$publicacion->archivo->nombre.'.'.$publicacion->archivo->extension)}}" alt="profile">
        {{-- {{dd(time());}} --}}

    </div>
</x-app-layout>
