@extends('app')
@section('title', 'LIBROS')
@section('content')


    <h1>PRESTAMOS</h1>

    <table>
        
           <tr>
            <th>TITULO LIBRO</th>
            <th>ISBN</th>
            <th>Fecha inicio prestamo</th>
            <th>Fecha final prestamo</th>
            <th>Prestamo Finalizado</th>
        </tr>
        @foreach ($librosPrestados as $lisbroPrestado)
            <tr>
                <td>{{ $lisbroPrestado['titulo'] }}</td>
                <td>{{ $lisbroPrestado['isbn']}}</td>
                
                <td>{{ $lisbroPrestado['datosPrestamo']->fecha_prestamo}}</td>
                <td>{{ $lisbroPrestado['datosPrestamo']->fecha_devolucion }}</td>
                @if ($lisbroPrestado['datosPrestamo']->finalizado === 0)
                    <td>LIBRO PRESTADO</td>
                @else
                    <td>PRESTAMO FINALIZADO</td>
                @endif
                
                <td>
                    <a class="botonesTablaLibros eliminar"
                        href="#">ELIMINAR</a>
                    <a class="botonesTablaLibros" href="#">EDITAR</a>
                    <a class="botonesTablaLibros" href="#">MAS
                        DETALLES</a>
                </td>
            </tr>
        @endforeach
       
    </table>
@endsection