<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0">

        <title>@yield('title') - Film Site</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awsome.min.css">
        <script src="https://kit.fontawesome.com/831f75aa65.js" crossorigin="anonymous"></script>

    </head>
    <body background="https://panels-images.twitch.tv/panel-148184955-image-1ccba030-20ed-4c7b-b25a-cfef055fb86c" class="background-gray-100 text-gray-800">

        <nav class="flex py-5 bg-indigo-500 text-white">

            <div class="w-1/2 px-12 mr-auto">
                <a href="{{ route('main.home') }}" class="text-2xl font-bold"> FIlm SIte</a>
            </div>

            <ul class="w-1/2 px-16  ml-auto flex justify-end pt-1">

                <li class="mx-0">
                    <p class="text-x1">Bienvenido <b>Invitado</b></p>
                </li>

                <li class="mx-1">
                    <a href="{{ route('login.index') }}" class="font-semibold 
                    hover:bg-indigo-700 py-3 px-4 rounded-md">Inicio de sesion</a>
                </li>
                <li class="mx-1">
                    <a href="{{ route('register.index') }}" class="font-semibold 
                    border-2 border-white hover:bg-white hover:text-indigo-700 py-2 px-4 rounded-md">Registrar</a>
                </li>

            </ul>

        </nav>
    
        @yield('content')


    </body>
</html>