<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body class="font-sans antialiased">
    @livewireScripts
    <nav id="header" class="w-full z-30 top-10 py-1 bg-white shadow-lg border-b border-blue-400 mt-24">
        <div class="w-full flex items-center justify-between mt-0 px-6 py-2">
            <label for="menu-toggle" class="cursor-pointer md:hidden block">
                <svg class="fill-current text-blue-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 0 20 20">
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>
            <input class="hidden" type="checkbox" id="menu-toggle">

            <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
                <nav>
                    <ul class="md:flex items-center justify-between text-base text-blue-600 pt-4 md:pt-0">
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2"
                                href="#">Inicio</a></li>
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2"
                                href="#">Mi perfil</a></li>
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2"
                                href="#">Reportes</a></li>
                        <li><a href="#">
                                <img class="h-10 w-10 rounded-full hover:scale-110 duration-150"
                                    src="{{ url('/img/prueba-01.jpg') }}" alt="profile">
                            </a>
                            <div>
                                <ul>
                                    <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2"
                                            href="#">Inicio</a></li>
                                    <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2"
                                            href="#">Mi perfil</a></li>
                                    @auth
                                        <li>
                                            @if (Auth::user()->rol == 'admin')
                                                <a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2"
                                                    href="#">Gestión de reportes></a>
                                            @endif
                                        </li>
                                    @endauth
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="">
                                @auth
                                    <div class="auth flex items-center w-full md:w-full">

                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <a class="bg-transparent text-gray-800  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); this.closest('form').submit();"
                                                role="button">Cerrar
                                                sesión</a>
                                        </form>
                                    </div>
                                @endauth
                            </a>
                        </li>
                        <li>
                            <a href="">
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
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>


        </div>
    </nav>
    <main>
        {{ $slot }}
    </main>
    <footer class="footer relative pt-1 " style="background-color:#202124">
        <div class="container mx-auto px-6">

            <div class="sm:flex sm:mt-8">
                <div class="mt-8 sm:mt-0 sm:w-full sm:px-8 flex flex-col md:flex-row justify-between">
                    <div class="flex flex-col">
                        <span class="font-bold text-white uppercase mb-2">Acerca de nosotros</span>
                        <span class="my-2"><a href="#" class="text-white  text-md hover:text-blue-500">Acerca de
                                Creartio</a></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white uppercase mt-4 md:mt-0 mb-2">Contáctanos</span>
                        <span class="my-2"><a href="#" class="text-white text-md hover:text-blue-500"><i
                                    class="fa-solid fa-envelope"></i> staff@creartio.com</a></span>
                        <span class="my-2"><a href="#" class="text-white  text-md hover:text-blue-500"><i
                                    class="fa-solid fa-location-dot"></i> C\ Montes de Hierro 32, Lebrija</a></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white uppercase mt-4 md:mt-0 mb-2">Redes sociales</span>
                        <span class="my-2"><a href="//www.instagram.com/creartio/" class="text-white  text-md hover:text-blue-500"><i
                                    class="fa-brands fa-instagram"></i> Instagram</a></span>
                        <span class="my-2"><a href="//www.facebook.com/creartio/" class="text-white  text-md hover:text-blue-500"><i
                                    class="fa-brands fa-facebook"></i> Facebook</a></span>
                        <span class="my-2"><a href="//www.twitter.com/creartio" class="text-white  text-md hover:text-blue-500"><i
                                    class="fa-brands fa-twitter"></i> Twitter</a></span>
                        <span class="my-2"><a href="//creartio.tumblr.com" class="text-white  text-md hover:text-blue-500"><i
                                    class="fa-brands fa-tumblr"></i> Tumblr</a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-6">
            <div class="mt-16 flex flex-col items-center">
                <div class="sm:w-2/3 text-center py-6">
                    <p class="text-sm text-blue-700 font-bold mb-2">
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
