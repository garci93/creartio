<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body class="font-sans antialiased">
    @livewireScripts
    <nav id="header" class="z-30 bg-white shadow-lg border-b border-cyan-400">
        <div class="flex items-center justify-items-end justify-between mt-0 py-2 px-6 mr-auto">
            <label for="menu-toggle" class="cursor-pointer md:hidden block">
                <svg class="fill-current text-cyan-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 0 20 20">
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>
            <input class="hidden" type="checkbox" id="menu-toggle">

            <a href="/publicaciones">
                <img class="inline h-12 mx-auto" src="{{Storage::disk('s3')->url('layout/logo-400-white.png')}}" alt="profile">
            </a>
            @auth
                @if (Auth::user()->rol == 'admin')
                    <a class="inline no-underline hover:text-black font-medium text-lg px-4 lg:-ml-2"
                        href="/reportes">Gestión de reportes</a>
                @endif
            @endauth

            <div id="menu" class="hidden md:flex md:ml-auto md:items-center justify-end md:w-auto w-full order-2 md:order-1">
                <nav class="inline justify-end">
                    @auth
                        <a class="inline align-middle no-underline text-cyan-600 hover:text-cyan-400 box-border text-lg font-bold pt-2 pb-10 px-4"
                            href={{url('/publicaciones/create')}}>Nueva publicación</a>
                        <a class="inline-block pr-4" href="/profile/{{Auth::user()->nombre}}">
                            <img class="h-12 mx-auto rounded-full hover:scale-110 duration-150" src="{{Storage::disk('s3')->url('fotos-perfil/def-avatar.png')}}" alt="profile">
                        </a>
                        <form class="inline-block" action="{{ route('logout') }}" method="post">
                            @csrf
                            <a class="inline align-middle no-underline hover:text-black font-medium text-md pt-2 pb-10 px-4 lg:-ml-2"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                role="button">Cerrar sesión</a>
                        </form>
                    @endauth
                    {{-- <a href="">
                        <div class="order-2 md:order-3 flex flex-wrap items-center justify-end mr-0 md:mr-4"
                            id="nav-content">

                            @guest
                                <div class="auth flex items-center w-full md:w-full">
                                    <a class="bg-transparent text-gray-800  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700"
                                        href="/login">Iniciar sesión</a>
                                    <a class="bg-blue-600 text-gray-200  p-2 rounded  hover:bg-blue-500 hover:text-gray-100"
                                        href="/register">Regístrate</a>
                                </div>
                            @endguest

                        </div>
                    </a> --}}
                </nav>
            </div>


        </div>
    </nav>
    <main>
        {{ $slot }}
    </main>
</body>
</html>
