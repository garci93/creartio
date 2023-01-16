<x-head-layout>
    <form class="pl-10 form-group" action="{{route("reportes.store")}}" method="post">
        @csrf
        <div>
            <br>
            <input class="m-1 border" type="text" name="nombre">
            <label for="nombre">Nombre del usuario reportado</label>
            <br>
            <input class="m-1 border"  type="text" name="razon">
            <label for="razon">Razón del reporte</label>
            <br>
            <br>
        </div>
        <div class="flex">
            <button type="submit" class="mr-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear reporte</button>
            <a class="flex bg-transparent text-gray-800  p-2 rounded border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                    href="/reportes">Volver</a>
        </div>
    </form>
</x-head-layout>
