@extends('layouts.app2')

@section('title', 'Agregar')

@section('content') 

<div class="block mx-auto my-12 p-8 bg-gray w-1/3 border border-gray-200 rounded-lg shodow-lg">

    <h1 class="text-3xl text-center font-bold">actores que participan en {{ $film->title }}</h1>

    <form class="mt-4" method="POST" enctype="multipart/form-data" action="{{ route('actorgroup.store') }}">
        @csrf

        @if(Session::has('message'))
            <p class="border border-yellow-500 rounded-md bg-yellow-100 w-full
            text-pink-900 p-2 my-2 font-semibold">{{ Session::get('message') }}</p>
        @endif

        <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        p-2 my-2 focus:bg-white" placeholder="Actor" id="actor" name="actor">

        @error('actor')
        <p class="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">* {{ $message }}</p>
        @enderror

        <button type="submit" name="add" value="add" class="rounded-md bg-indigo-500 w-full text-lg text-white
        font-semibold p-2 my-3 hover:bg-indigo-600">agregar actor</button>
        
        <button type="submit" name="end" value="end" class="rounded-md bg-indigo-500 w-full text-lg text-white
        font-semibold p-2 my-3 hover:bg-indigo-600">Finalizar operacion</button>

    </form>

</div>

@endsection