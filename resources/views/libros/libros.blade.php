@extends('app')
@section('title', 'LIBROS')
@section('content')
    {{-- @livewire('tabla-libros') --}}
    <nav>
        <ul>
            <li><a href="/formulario-add-book">AÑADIR LIBRO</a></li>
        </ul>
    </nav>



    <table>
        <form action={{ route('searchBook') }} method="post">
            @csrf
            <label for="inputBuscarLibro">Buscar:</label>
            <input type="text" name="inputBuscarLibro" id="inputBuscarLibro" placeholder="itroduce tiulo o isbn">
            <button type="submit">BUSCAR</button>
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
                </td>
            </tr>
        @endforeach
        @else
        <h2 style="color: red">NO SE ENCONTRO NINGUN LIBRO</h2>
           {{-- {{ $libros }} --}}
        @endif
    </table>
@endsection
