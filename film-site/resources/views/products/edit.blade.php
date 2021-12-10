@extends('layouts.app2')

@section('title', 'Editar')

@section('content')

<div class="block mx-auto my-12 p-8 bg-gray w-1/3 border border-gray-200 rounded-lg shodow-lg">

    <h1 class="text-3xl text-center font-bold">Editar pelicula {{ $product->title }}</h1>

    <form class="mt-4" method="POST" enctype="multipart/form-data" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('put')
        <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        p-2 my-2 focus:bg-white" placeholder="Titulo" id="title" name="title" value="{{ $product->title }}">

        @error('title')
        <p class="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">* {{ $message }}</p>
        @enderror

        <select class="border border-gray-200 rounded-md bg-gray-200 w-full
        text-lg p-2 my-2 focus:bg-white" name="director" id="director">
        @foreach ($directors as $d)
         
        @if ($d->name == $product->director)

        <option selected value= "{{ $d->name }}"> {{ $d->name }} </option>

        @else

        <option value= "{{ $d->name }}"> {{ $d->name }} </option>
            
        @endif

        @endforeach
        </select>

        @error('director')
        <p class="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">* {{ $message }}</p>
        @enderror

        <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
        text-lg p-2 my-2 focus:bg-white" placeholder="Synopsis" id="synopsis" name="synopsis" value="{{ $product->synopsis }}">

        @error('synopsis')
        <p class="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">* {{ $message }}</p>
        @enderror

        <input type="number" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        p-2 my-2 focus:bg-white" placeholder="Estreno" id="year" name="year" value="{{ $product->year }}">

        @error('year')
        <p class="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">* {{ $message }}</p>
        @enderror

        <input type="file" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        p-2 my-2 focus:bg-white" name="image" placeholder="Choose image" id="image" accept="image/jpg, image/png, image/jpeg">
        
        @error('image')
        <p class="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">* {{ $message }}</p>
        @enderror

        <button type="submit" class="rounded-md bg-green-300 w-full text-lg text-white
        font-semibold p-2 my-3 hover:bg-green-400">Editar</button>

    </form>

</div>

@endsection