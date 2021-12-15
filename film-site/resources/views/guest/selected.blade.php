@extends('layouts.app3')

@section('title', 'pelicula seleccionada')

@section('content')

<div class="block mx-auto my-12 p-8 bg-gray-400 w-1/3 border border-gray-200 rounded-lg shodow-lg">

    <div class="rounded-md bg-purple w-full text-lg text-pink-900
    font-semibold p-2 my-3 hover:bg-yellow-100 border border-pink-900 rounded-lg shodow-lg">

    <br>

    <img class="img-responsive"  src="{{ Storage::url($product->photopath) }}">

    <br>

    <p class="text-center">{{ $product->title }}</p>

    <br>

    <p class="text-indigo-600 text-center">Sinopsis</p>

    <br>

    <p class="text-center">{{ $product->synopsis }}</p>

    <br>

    <p class="text-indigo-600 text-center">Director</p>

    <br>

    <form method="POST" action="{{ route('main.directorselected') }}">
                                                
        @csrf

        <input id="invisible" name="invisible" type="hidden" value="{{  $product->director }}">
            
        <button class="w-full font-semibold">
        {{ $product->director }}
        </button>
            
    </form>

    <br>

    <p class="text-indigo-600 text-center">genero</p>

    <br>

    <p class="text-center">{{ $product->genre }}</p>

    <br>

    <br>

    <p class="text-indigo-600 text-center">Estreno</p>

    <br>

    <p class="text-center">{{ $product->year }}</p>

    <br>

    <p class="text-indigo-600 text-center">Actores</p>

    <br>

    @foreach ($actorgroup as $item)

        <form method="POST" action="{{ route('main.actorselected') }}">
                                                
            @csrf

            <input id="invisible" name="invisible" type="hidden" value="{{  $item->actor }}">

            <button class="w-full font-semibold">
                <p>{{ $item->actor }},</p>
            <button>

        </form>
                                        
    @endforeach

    </div>

</div>

@endsection