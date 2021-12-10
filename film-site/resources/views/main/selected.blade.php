@extends('layouts.app2')

@section('title', 'admin')

@section('content')

<div class="block mx-auto my-12 p-8 bg-gray-400 w-1/3 border border-gray-200 rounded-lg shodow-lg">

    <h1 class="text-3xl text-center font-bold">Pelicula mas reciente</h1>

        <br>

        <button class="rounded-md bg-purple w-full text-lg text-pink-900
        font-semibold p-2 my-3 hover:bg-yellow-100 border border-pink-900 rounded-lg shodow-lg" type="submit" id="film_selected" name="btn_add">

        <img class="img-responsive" src="{{ Storage::url($product->photopath) }}">

        <p>{{ $product->title }}</p>

        </button>

        <br>

</div>

@endsection