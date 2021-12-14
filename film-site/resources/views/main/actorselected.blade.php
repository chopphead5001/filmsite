@extends('layouts.app')

@section('title', 'director seleccionado')

@section('content')

<div class="block mx-auto my-12 p-8 bg-gray-400 w-1/3 border border-gray-200 rounded-lg shodow-lg">

    <h1 class="text-3xl text-center font-bold">Peliculas en la que actuo</h1>

    <br>

    @foreach ($product as $row)

    @foreach ($actorgroupfilm as $items)
        
    @if ($items->film == $row->id)

    <form class="mt-4" method="POST" enctype="multipart/form-data" action="{{ route('main.selected') }}">

        @csrf

        <input id="invisible" name="invisible" type="hidden" value="{{  $row->id }}">

        <button class="rounded-md bg-purple w-full text-lg text-pink-900
        font-semibold p-2 my-3 hover:bg-yellow-100 border border-pink-900 rounded-lg shodow-lg" type="submit" id="{{ $row->id }}" name="btn_add" value="{{ $row->id }}">

        <img class="img-responsive" src="{{ Storage::url($row->photopath) }}">

        <p>{{ $row->title }}</p>

        </button>

    </form>

    @endif

    @endforeach

    @endforeach

</div>

@endsection