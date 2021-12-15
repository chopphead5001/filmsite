@extends('layouts.app2')

@section('title', 'Editar')

@section('content')

<div class="block mx-auto my-12 p-8 bg-gray w-1/3 border border-gray-200 rounded-lg shodow-lg">

    <h1 class="text-3xl text-center font-bold">Editar actores</h1>
        
    @foreach ($actorgroup as $row)

        <form class="mt-4" method="POST" enctype="multipart/form-data" action="{{ route('actorgroup.selected') }}">

            @csrf

            <input id="invisible" name="invisible" type="hidden" value="{{  $row->id }}">

            <button class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg p-2 my-2 hover:bg-green-400 hover:text-white hover:border-green-400" type="submit" id="{{ $row->id }}" name="btn_add" value="{{ $row->id }}">

            <p>{{ $row->actor }}</p>

            </button>

        </form>

    @endforeach

    <form class="mt-4" method="POST" enctype="multipart/form-data" action="{{ route('actorgroup.add') }}">

        @csrf

        <input id="invisible" name="invisible" type="hidden" value="{{  $product->id }}">

        <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white
        font-semibold p-2 my-3 hover:bg-indigo-600 rounded-lg shodow-lg">Agregar actor</button>

    </form>

    <form class="mt-4" method="get" enctype="multipart/form-data" action="{{ route('actorgroup.finish') }}">

        @csrf

        <button type="submit" class="rounded-md bg-green-300 w-full text-lg text-white
        font-semibold p-2 my-3 hover:bg-green-400">Finalizar edicion</button>

    </form>

</div>
   
@endsection