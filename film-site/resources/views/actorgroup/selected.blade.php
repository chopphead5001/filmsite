@extends('layouts.app2')

@section('title', 'Editar')

@section('content')

<div class="block mx-auto my-12 p-8 bg-gray w-1/3 border border-gray-200 rounded-lg shodow-lg">

    <h1 class="text-3xl text-center font-bold">Editar actor {{ $actorgroup->actor }}</h1>

    <form class="mt-4" method="POST" enctype="multipart/form-data" action="{{ route('actorgroup.update', $actorgroup->id) }}">
        @csrf

        @method('PUT')

        @if(Session::has('message'))
            <p class="border border-yellow-500 rounded-md bg-yellow-100 w-full
            text-pink-900 p-2 my-2 font-semibold">{{ Session::get('message') }}</p>
        @endif

        <select class="border border-gray-200 rounded-md bg-gray-200 w-full
        text-lg p-2 my-2 focus:bg-white" name="actor" id="actor">
        
        @foreach ($actors as $a)

        @if ($a->name == $actorgroup->actor)

            <option value="{{ $a->name }}" selected> {{ $a->name }} </option>

        @else
            
            <option value="{{ $a->name }}"> {{ $a->name }} </option>

        @endif

        @endforeach
        </select>

        @error('actor')
        <p class="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">* {{ $message }}</p>
        @enderror

        <button type="submit" name="upgrade" value="upgrade" class="rounded-md bg-green-300 w-full text-lg text-white
        font-semibold p-2 my-3 hover:bg-green-400">Editar actor</button>

    </form>

    <form method="POST" action="{{ route('actorgroup.destroy', $actorgroup->id) }}">
        @csrf

        @method('delete')

        <button type="submit" name="upgrade" value="upgrade" class="rounded-md bg-red-300 w-full text-lg text-white
        font-semibold p-2 my-3 hover:bg-red-400">Eliminar actor</button>
        
    </form>

</div>
   
@endsection