@extends('layouts.app2')

@section('title', 'Editar')

@section('content')

<div class="block mx-auto my-12 p-8 bg-gray w-1/3 border border-gray-200 rounded-lg shodow-lg">

    <h1 class="text-3xl text-center font-bold">Editar actor </h1>

    <form class="mt-4" method="POST" enctype="multipart/form-data" enctype="multipart/form-data" action="{{ route('actorgroup.update', $product->id) }}">
        @csrf

        @if(Session::has('message'))
            <p class="border border-yellow-500 rounded-md bg-yellow-100 w-full
            text-pink-900 p-2 my-2 font-semibold">{{ Session::get('message') }}</p>
        @endif

        @method('put')

        @php
            
            $count = 0;

        @endphp

        @foreach ($actorgroup as $row)

        @php
            
            $count ++;

        @endphp

        <select class="border border-gray-200 rounded-md bg-gray-200 w-full
        text-lg p-2 my-2 focus:bg-white" name="actor{{ $count }}" id= "actor{{ $count }}">

        @foreach ($actors as $item)
        
        @if ($item->name == $row->actor)

        <option selected value= "{{ $item->name }}"> {{ $item->name }} </option>

        @else

        <option value= "{{ $item->name }}"> {{ $item->name }} </option>
            
        @endif

        @endforeach
        
        </select>

        @endforeach

        <button type="submit" name="edit" value="edit" class="rounded-md bg-green-300 w-full text-lg text-white
        font-semibold p-2 my-3 hover:bg-green-400">Editar</button>

        <button type="submit" name="end" value="end" class="rounded-md bg-green-300 w-full text-lg text-white
        font-semibold p-2 my-3 hover:bg-green-400" >Finalizar edicion</button>

    </form>

</div>
   
@endsection