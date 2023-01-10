<x-app-layout>
    <form class="pl-10 form-group" action="{{url('/publicaciones/'.$publicacion->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div>
            <br>
            <input class="m-1 border" type="text" name="titulo" value="{{$datos_publicacion[0]->titulo}}">
            <label for="titulo">Título</label>
            <br>
            <input class="m-1 border" type="text" name="texto" value="{{$datos_publicacion[0]->texto}}">
            <label for="texto">Texto</label>
            <br>
            <br>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
    </form>
</x-app-layout>
