<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
