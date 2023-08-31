@extends('app')
@section('title', 'AÑADIR LIBRO')
@section('content')
<h1>AÑADIR LIBRO</h1>
    <form action="{{ route('addLibro') }}" method="post">
        @csrf
        <label for="inputIsbnBook">Libro Isbn:</label>
        <input type="text" name="inputIsbnBook" id="inputIsbnBook">
        <label for="inputTituloBook">Titulo del libro:</label>
        <input type="text" name="inputTituloBook" id="inputTituloBook">
        <label for="inputAutorBook">Autor del Libro:</label>
        <input type="text" name="inputAutorBook" id="inputAutorBook">
        <label for="inputPublicacionBook">Fecha Publicación libro:</label>
        <input type="date" name="inputPublicacionBook" id="inputPublicacionBook">
        <label for="inputGeneroBook">Genero del libro</label>
        <input type="text" name="inputGeneroBook" id="inputGeneroBook">
        <label for="selectDisponibilidadBook">Disponible</label>
        <select name="selectDisponibilidadBook" id="selectDisponibilidadBook">
            <option value="true">SI</option>
            <option value="false">NO</option>
        </select>
        <input type="submit" value="AGREGAR LIBRO">
    </form>
@endsection