<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body class="font-sans antialiased">
    @livewireScripts
    <main>
        {{ $slot }}
    </main>
</body>

</html>
