<x-head-layout>
    <form class="pl-10 form-group" action="{{route("publicaciones.store")}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div>
            <div class="panel-body">
                <!-- Alerta de éxito -->
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ $message }}
                </div>
                <img src="{{ Session::get('image') }}">
                @endif

                <!-- Alerta de error -->
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        Error al subir el archivo.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <br>
            <input class="m-1 border" type="text" name="titulo">
            <label for="titulo">Titulo</label>
            <input class="hidden m-1 border" value={{ auth()->user()->id }} type="text" name="usuario_id">
            <br>
            <textarea rows="4" class="w-1/2 m-1 border" type="text" name="texto"></textarea>
            <label for="texto">Descripción</label>
            <br>
            <br>
            <div class="row">

                <div class="col-md-6">
                    <input type="file" name="image" class="form-control">
                </div>

            </div>
        </div>
        <br>
        <div class="flex">
            <button type="submit" class="mr-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear publicación</button>
            <a class="flex font-medium rounded-lg bg-transparent text-gray-800  p-2 rounded border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
            href="/publicaciones">Volver</a>
        </div>
    </form>
</x-head-layout>
