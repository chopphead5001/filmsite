@extends('layouts.app')

@section('title', 'admin')

@section('content')

<div class="block mx-auto my-12 p-8 bg-gray-400 w-1/3 border border-gray-200 rounded-lg shodow-lg">

    <h1 class="text-3xl text-center font-bold">Pelicula mas reciente</h1>

    <br>

    <button class="rounded-md bg-purple w-full text-lg text-pink-900
        font-semibold p-2 my-3 hover:bg-yellow-100 border border-pink-900 rounded-lg shodow-lg" type="submit" id="film_selected" name="btn_add">

    <img class="img-responsive"  src="{{ Storage::url($product->photopath) }}">

    <br>

    <p>{{ $product->title }}</p>

    <br>

    <p class="text-indigo-600">Sinopsis</p>

    <br>

    <p>{{ $product->synopsis }}</p>

    <br>

    <p class="text-indigo-600">Director</p>

    <br>

    <p>{{ $product->director }}</p>

    <br>

    <p class="text-indigo-600">Estreno</p>

    <br>

    <p>{{ $product->year }}</p>

    <br>

    <p class="text-indigo-600">Actores</p>

    <br>

    @foreach ($actorgroup as $row)

    <p>{{ $row->actor }}</p>

    <br>

    @endforeach

    </button>

</div>

@endsection