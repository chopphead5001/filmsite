@extends('layouts.app2')

@section('title', 'Peliculas')

@section('content')

<div class="bg-white overflow-hidden shadow-xl">

    <table class="min-w-full divide-y divide-gray-200 border-separate">
        <thead>
            <tr class="bg-purple-400 text-white">
                <th class="w-1/8 py-4 ...">ID</th>
                <th class="w-1/4 py-4 ...">Titulo</th>
                <th class="w-1/8 py-4 ...">Pais</th>
                <th class="w-1/8 py-4 ...">Precio</th>
                <th class="w-1/8 py-4 ...">Creado</th>
                <th class="w-1/8 py-4 ...">Actualizado</th>
                <th class="w-1/8 py-4 ...">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if(auth()->user()->role == 'admin') 
                @foreach ($products as $row)
                
                    <tr>
                        <td class="py-3 px-6 text-center">{{ $row->id }}</td>
                        <td class="p-3 text-center">{{ $row->title }}</td>
                        <td class="p-3 text-center">{{ $row->country }}</td>
                        <td class="p-3 text-center">{{ $row->price }}</td>
                        <td class="p-3 text-center">{{ $row->created_at }}</td>
                        <td class="p-3 text-center">{{ $row->updated_at }}</td>
                        <td class="p-3 flex justify-center">
                            <form method="POST" action="{{ route('products.destroy', $row->id) }}">
                                @csrf
                                @method('delete')
                                <button class="bg-red-500 text-white px-3 py-1 rounded-sm mx-1">
                                <i class="fas fa-trash"></i></button>
                            </form>
                            <form>
                                @csrf
                                <a href="{{ route('products.edit', $row->id) }}" class="bg-green-500 text-white px-3 py-1 rounded-sm">
                                <i class="fas fa-pen"></i></a>
                            </form>
                        </td>
                    </tr>

                @endforeach
            @else 
                @foreach ($products as $row)
            
                    @if ($row->userid == Auth()->user()->id)
                        
                    <tr>
                        <td class="py-3 px-6 text-center">{{ $row->id }}</td>
                        <td class="p-3 text-center">{{ $row->title }}</td>
                        <td class="p-3 text-center">{{ $row->country }}</td>
                        <td class="p-3 text-center">{{ $row->price }}</td>
                        <td class="p-3 text-center">{{ $row->created_at }}</td>
                        <td class="p-3 text-center">{{ $row->updated_at }}</td>
                        <td class="p-3 flex justify-center">
                            <form method="POST" action="{{ route('products.destroy', $row->id) }}">
                                @csrf
                                @method('delete')
                                <button class="bg-red-500 text-white px-3 py-1 rounded-sm mx-1">
                                <i class="fas fa-trash"></i></button>
                            </form>
                            <form>
                                @csrf
                                <a href="{{ route('products.edit', $row->id) }}" class="bg-green-500 text-white px-3 py-1 rounded-sm">
                                <i class="fas fa-pen"></i></a>
                            </form>
                        </td>
                    </tr>

                    @endif

                @endforeach

            @endif

        </tbody>
    </table>
</div>

@endsection