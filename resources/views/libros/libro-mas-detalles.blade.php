@extends('app')
@section('title', 'Mas informacion')
@section('content')
    <section>
        <div>
            <h4>Titulo:</h4>
            <p>{{ $libro->titulo }}</p>
            <h4>Autor:</h4>
            <span>{{ $libro->autor }}</span>
            <h4>Fecha Publicación:</h4>
            <span>{{ $libro->año_publicacion}}</span>
            <h4>Genero:</h4>
            <span>{{ $libro->genero }}</span>
            <h4>Isbn:</h4>
            <span>{{ $libro->isbn }}</span>
            <h4>Disponibilidad:</h4>
            @if ($libro->disponible === 1)
            <span>El libro esta disponible para alquilar</span>
            @else
            <span>El libro no esta disponible para alquilar</span>
            @endif
            
        </div>
        <a class="botonesTablaLibros" href="http://127.0.0.1:8000/libros">RETROCEDER</a>
    </section>
@endsection