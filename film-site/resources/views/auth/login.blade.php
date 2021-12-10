@extends('layouts.app')

@section('title', 'inicia secion')

@section('content')

<div class="block mx-auto my-12 p-8 bg-gray w-1/3 border border-gray-200 rounded-lg shodow-lg">

    <h1 class="text-3xl text-center font-bold">inicia sesion en Film Site</h1>

    <form class="mt-4" method="POST" action="{{ route('login.store') }}">
        @csrf

        <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full
        text-lg p-2 my-2 focus:bg-white" placeholder="Email" id="email" name="email">

        <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        p-2 my-2 focus:bg-white" placeholder="Clave" id="password" name="password">

        @error('message')
        <p class="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">* {{ $message }}</p>
        @enderror

        <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white
        font-semibold p-2 my-3 hover:bg-indigo-600">Enviar</button>

    </form>



</div>

@endsection
