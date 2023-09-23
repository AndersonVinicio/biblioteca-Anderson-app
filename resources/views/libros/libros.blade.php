{{-- @extends('app')
@section('title', 'LIBROS')
@section('content') --}}
{{-- @livewire('tabla-libros') --}}
{{-- <nav>
    <ul>
        <li><a href="/formulario-add-book">AÑADIR LIBRO</a></li>
    </ul>
</nav> --}}


<x-app-layout>
    <x-slot name="header">
        <nav>
            <ul>
                <li ><a href="/formulario-add-book" class="hover-link">AÑADIR LIBRO</a></li>
            </ul>
        </nav>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table>
                    <form action={{ route('searchBook') }} method="post">
                        @csrf
                        <x-label for="inputBuscarLibro">Buscar:</x-label>
                        {{-- <input type="text" name="inputBuscarLibro" id="inputBuscarLibro" placeholder="itroduce tiulo o isbn"> --}}
                        <x-input type="text" name="inputBuscarLibro" id="inputBuscarLibro" placeholder="itroduce tiulo o isbn"/>
                        <x-button type="submit">BUSCAR</x-button>
                        <a class="botonesTablaLibros" href="/libros">Borra busqueda</a>
                    </form>
                    @if (!empty($libros))
                
                    <tr>
                        <th>TITULO LIBRO</th>
                        <th>ISBN</th>
                    </tr>
                    @foreach ($libros as $libro)
                    <tr>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->isbn }}</td>
                        <td>
                            <a class="botonesTablaLibros eliminar"
                                href="http://127.0.0.1:8000/delete-libro/{{ $libro->id }}">ELIMINAR</a>
                            <a class="botonesTablaLibros" href="http://127.0.0.1:8000/edit-libro/{{ $libro->id }}">EDITAR</a>
                            <a class="botonesTablaLibros" href="http://127.0.0.1:8000/detalles-libro/{{ $libro->id }}">MAS
                                DETALLES</a>
                            @if ($libro->disponible === 1)
                                <a class="botonesTablaLibros" href="/formulario-add-prestamo/{{ $libro->id }}">Prestar</a>
                            @else
                            <a class="disabled-link" href="#">No disponible</a>
                            @endif
                
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <h2 style="color: red">NO SE ENCONTRO NINGUN LIBRO</h2>
                
                    @endif
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
{{-- 
@endsection --}}