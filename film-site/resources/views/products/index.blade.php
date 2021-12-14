@extends('layouts.app2')

@section('title', 'Peliculas')

@section('content')

    <div class="bg-white overflow-hidden shadow-xl">

        @if(Session::has('message'))
            <p class="border border-yellow-500 rounded-md bg-yellow-100 w-full
            text-pink-900 p-2 my-2 font-semibold">{{ Session::get('message') }}</p>
        @endif
            
        <table class="min-w-full divide-y divide-gray-200 border-separate">
            <thead>
                <tr class="bg-yellow-400 text-pink-900">  
                    
                    @if(auth()->user()->role == 'admin')
                        <th class="w-1/10 py-4 ...">ID</th>
                    @endif
                    <th class="w-1/10 py-4 ...">Titulo</th>
                    <th class="w-1/10 py-4 ...">Director</th>
                    <th class="w-1/10 py-4 ...">Genero</th>
                    <th class="w-1/10 py-4 ...">Actores</th>
                    <th class="w-1/10 py-4 ...">Sinopsis</th>
                    <th class="w-1/10 py-4 ...">Estreno</th>
                    <th class="w-1/10 py-4 ...">Portada</th>
                    <th class="w-1/10 py-4 ...">Creado</th>
                    <th class="w-1/10 py-4 ...">Actualizado</th>
                    <th class="w-1/10 py-4 ...">Acciones</th>
                    
                </tr>
            </thead>

            <tbody>
                @if(auth()->user()->role == 'admin')
                    @php
                        $counter = 0;
                    @endphp 
                        
                    @foreach ($products as $row)
                        @php
                            $counter ++;
                            $paroimpar = $counter % 2;   
                        @endphp
                            
                        @if ($paroimpar == 0)

                            <tr class="bg-gray-400 text-black">

                        @else
                            
                            <tr class="bg-gray-600 text-white">

                        @endif
                            
                                <td class="py-3 px-6 text-center font-semibold">{{ $row->id }}</td>
                                <td class="p-3 text-center font-semibold">{{ $row->title }}</td>
                                <td class="p-3 text-center font-semibold">{{ $row->director }}</td>
                                <td class="p-3 text-center font-semibold">{{ $row->genre }}</td>
                                <td id="actor" class="p-3 text-center font-semibold">

                                    @foreach ($actorgroup as $item)

                                        
                                        @if ($item->film == $row->id)

                                            {{ $item->actor }},

                                            <br>

                                        @endif
                                        
                                    @endforeach

                                </td>
                                <td class="p-3 text-center font-semibold">{{ $row->synopsis }}</td>
                                <td class="p-3 text-center font-semibold">{{ $row->year }}</td>
                                <td class="p-3 text-center font-semibold"><img width="100px" src="{{ Storage::url($row->photopath) }}"></td>
                                <td class="p-3 text-center font-semibold">{{ $row->created_at }}</td>
                                <td class="p-3 text-center font-semibold">{{ $row->updated_at }}</td>
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

                        @php
                            $counter = 0;
                        @endphp
                    
                        @foreach ($products as $row)

                            @if ($row->userid == Auth()->user()->id) 

                                @php
                                    $counter ++;
                                    $paroimpar = $counter % 2;   
                                @endphp
                        
                            @if ($paroimpar == 0)

                                <tr class="bg-gray-400 text-black">

                            @else
                                
                                <tr class="bg-gray-600 text-white">

                            @endif

                                <td class="p-3 text-center font-semibold">{{ $row->title }}</td>
                                <td class="p-3 text-center font-semibold">{{ $row->director }}</td>
                                <td class="p-3 text-center font-semibold">{{ $row->genre }}</td>
                                <td class="p-3 text-center font-semibold">
                                    
                                    @foreach ($actorgroup as $item)
                                        
                                        @if ($item->film == $row->id)

                                            {{ $item->actor }},

                                            <br>

                                        @endif
                                        
                                    @endforeach

                                </td>
                                <td class="p-3 text-center font-semibold">{{ $row->synopsis }}</td>                                    
                                <td class="p-3 text-center font-semibold">{{ $row->year }}</td>
                                <td class="p-3 text-center font-semibold"><img width="100px" src="{{ Storage::url($row->photopath) }}"></td>
                                <td class="p-3 text-center font-semibold">{{ $row->created_at }}</td>
                                <td class="p-3 text-center font-semibold">{{ $row->updated_at }}</td>
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