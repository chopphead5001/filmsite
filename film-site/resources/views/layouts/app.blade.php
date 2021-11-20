<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0">

        <title>@yield('title') - Film Site</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awsome.min.css">
        <script src="https://kit.fontawesome.com/831f75aa65.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    </head>
    <body class="background-gray-100 text-gray-800">

        <nav class="flex py-5 bg-indigo-500 text-white">

            <div class="w-1/2 px-12 mr-auto">
                <a class="text-2xl font-bold"> FIlm SIte</a>
            </div>

            <ul class="w-1/2 px-16  ml-auto flex justify-end pt-1">
            
            

            @if(auth()->check())

            <li class="mx-1">
                <a href="{{ route('products.create') }}" class="font-semibold 
                hover:bg-indigo-700 py-3 px-4 rounded-md">Agregar</a>
            </li>
            <li class="mx-1">
                <a href="{{ route('products.index') }}" class="font-semibold 
                hover:bg-indigo-700 py-3 px-4 rounded-md">Peliculas</a>
            </li>
                <li class="mx-1">
                    <p class="text-xl">Bienvenido <b>{{ auth()->user()->name }}</b></p>
                </li>
                <li class="mx-1">
                    <a href="{{ route('login.destroy') }}" class="font-bold 
                    hover:bg-red-600 bg-red-500 py-2 px-4 rounded-md">Salir</a>
                </li>

            @else

                <li class="mx-1">
                    <a href="{{ route('guest.index') }}" class="font-semibold 
                    hover:bg-indigo-700 py-3 px-4 rounded-md">Ingresar como invitado</a>
                </li>
                <li class="mx-1">
                    <a href="{{ route('login.destroy') }}" class="font-semibold 
                    hover:bg-indigo-700 py-3 px-4 rounded-md">Inicio de sesion</a>
                </li>
                <li class="mx-1">
                    <a href="{{ route('register.index') }}" class="font-semibold 
                    border-2 border-white hover:bg-white hover:text-indigo-700 py-2 px-4 rounded-md">registrate</a>
                </li>

            @endif
            </ul>

        </nav>
    
        @yield('content')


    </body>
</html>