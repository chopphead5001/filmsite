@extends('layouts.app2')

@section('title', 'Agregar')

@section('content')

<div class="block mx-auto my-12 p-8 bg-gray w-1/3 border border-gray-200 rounded-lg shodow-lg">

    <h1 class="text-3xl text-center font-bold">Crear pelicula</h1>

    <form class="mt-4" method="POST" action="{{ route('products.store') }}" >
        @csrf

        <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        p-2 my-2 focus:bg-white" placeholder="Titulo" id="title" name="title">

        <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
        text-lg p-2 my-2 focus:bg-white" placeholder="Pais" id="country" name="country">

        <input type="number" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        p-2 my-2 focus:bg-white" placeholder="Precio" id="price" name="price">
        
        @error('message')
        <p class="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">*ERROR</p>
        @enderror

        <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white
        font-semibold p-2 my-3 hover:bg-indigo-600">Enviar</button>

    </form>

</div>

@endsection