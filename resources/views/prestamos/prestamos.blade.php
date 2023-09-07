@extends('app')
@section('title', 'LIBROS')
@section('content')
    {{-- @livewire('tabla-libros') --}}
    <nav>
        <ul>
            <li><a href="/formulario-add-prestamo">REALIZAR PRESTAMO</a></li>
        </ul>
    </nav>



    <table>
        {{-- <form action={{ route('searchBook') }} method="post">
            @csrf
            <label for="inputBuscarLibro">Buscar:</label>
            <input type="text" name="inputBuscarLibro" id="inputBuscarLibro" placeholder="itroduce tiulo o isbn">
            <button type="submit">BUSCAR</button>
            <a class="botonesTablaLibros" href="/libros">Borra busqueda</a>
        </form> --}}
        {{-- @if (!empty($libros)) --}}
        
           <tr>
            <th>TITULO LIBRO</th>
            <th>ISBN</th>
            <th>Fecha inicio prestamo</th>
            <th>Fecha final prestamo</th>
            <th>Prestamo Finalizado</th>
        </tr>
        {{-- @foreach ($libros as $libro) --}}
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a class="botonesTablaLibros eliminar"
                        href="#">ELIMINAR</a>
                    <a class="botonesTablaLibros" href="#">EDITAR</a>
                    <a class="botonesTablaLibros" href="#">MAS
                        DETALLES</a>
                </td>
            </tr>
        {{-- @endforeach
        @else
        <h2 style="color: red">NO SE ENCONTRO NINGUN LIBRO</h2>
           
        @endif --}}
    </table>
@endsection