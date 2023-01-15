<x-footer-layout>
    <div class="">
        <br>
        <br>
        <img class="w-1/2 mx-auto" src="{{Storage::disk('s3')->url('layout/logo-400-white.png')}}" alt="profile">
        <br>
        <br>
        <br>
        <h1 class="text-center text-2xl">Crea. Comparte. Inspira.</h1>
        <br>
        <p class="text-center text-lg">Forjada por artistas y para artistas, Creartio es el lugar donde compartir tus creaciones, conectar con otros artistas, y expandir tus horizontes.</p>
        <br>
        <p class="text-center text-lg">La espera se ha terminado. Ahora, la inspiración tiene una red social.</p>
        <br>
         @if (!Auth::check())
            <div class="flex mx-auto items-center">
                <a class="flex mx-auto items-center bg-blue-600 text-gray-200  p-2 rounded  hover:bg-blue-500 hover:text-gray-100"
                                                    href="/register">Regístrate</a>
            </div>
            <br>
            <p class="text-center text-lg">O si ya tienes una cuenta...</p>
            <br>
            <div class="flex mx-auto items-center">
                <a class="flex mx-auto items-center bg-transparent text-gray-800  p-2 rounded border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                                                    href="/login">Inicia sesión</a>
            </div>
         @else
            <div class="flex mx-auto items-center">
                <a class="flex mx-auto items-center bg-transparent text-gray-800  p-2 rounded border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                                                    href="/publicaciones">Volver a Inicio</a>
            </div>
            <br>
            <br>
         @endif

        <br>
        <br>
    </div>

</x-footer-layout>
