@extends('app')
@section('title', 'LIBROS')
@section('content')
<h1>EDITAR LIBRO</h1>
    <form action="{{ route('updateLibro') }}" method="post">
        @csrf
        
        <label for="inputIsbnBook">Libro Isbn:</label>
        <input type="text" name="inputIsbnBook" id="inputIsbnBook" value="{{ $libro->isbn }}">
        <label for="inputTituloBook">Titulo del libro:</label>
        <input type="text" name="inputTituloBook" id="inputTituloBook" value="{{ $libro->titulo }}">
        <label for="inputAutorBook">Autor del Libro:</label>
        <input type="text" name="inputAutorBook" id="inputAutorBook" value="{{ $libro->autor }}">
        <label for="inputPublicacionBook">Fecha Publicación libro:</label>
        <input type="date" name="inputPublicacionBook" id="inputPublicacionBook" value="{{ $libro->año_publicacion }}">
        <label for="inputGeneroBook">Genero del libro</label>
        <input type="text" name="inputGeneroBook" id="inputGeneroBook" value="{{ $libro->genero }}">
        <label for="selectDisponibilidadBook">Disponible</label>
        <select name="selectDisponibilidadBook" id="selectDisponibilidadBook">
            @if ($libro->disponible === 1)
                <option value="true" selected >SI</option>
                <option value="false">NO</option>
            @else
                <option value="true">SI</option>
                <option value="false" selected>NO</option>
            @endif
            
        </select>
        <input type="submit" value="ACTUALIZAR LIBRO">
    </form>
@endsection
