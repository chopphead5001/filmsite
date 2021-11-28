@extends('layouts.app2')

@section('title', 'Editar')

@section('content')

<div class="block mx-auto my-12 p-8 bg-gray w-1/3 border border-gray-200 rounded-lg shodow-lg">

    <h1 class="text-3xl text-center font-bold">Editar actores</h1>

    <form class="mt-4" method="POST" enctype="multipart/form-data" action="{{ route('actorgroup.update', $actorgroup->id) }}">
        @csrf
        @method('put')
        <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        p-2 my-2 focus:bg-white" placeholder="Actor" id="actor" name="actor" value="{{ $actorgroup->actor }}">

        @error('actor')
        <p class="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">* {{ $message }}</p>
        @enderror

        <button type="submit" class="rounded-md bg-green-300 w-full text-lg text-white
        font-semibold p-2 my-3 hover:bg-green-400">Editar</button>

    </form>

</div>

@endsection