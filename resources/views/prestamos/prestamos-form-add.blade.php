@extends('app')
@section('title', 'AÑADIR LIBRO')
@section('content')
<h1>AÑADIR LIBRO</h1>
    <form action="{{ route('realizarPrestamo') }}" method="post">
        @csrf
        {{-- DATOS DEL LIBRO A PRESTAR --}}
        <label for="inputIsbnBook">Libro Isbn:</label>
        <input type="text" name="inputIsbnBook" id="inputIsbnBook" value="{{ $libro->isbn }}">
        <label for="inputTituloBook">Titulo del libro:</label>
        <input type="text" name="inputTituloBook" id="inputTituloBook" value="{{ $libro->titulo }}">
        <label for="inputAutorBook">Autor del Libro:</label>
        <input type="text" name="inputAutorBook" id="inputAutorBook" value="{{ $libro->autor }}">
        {{-- DATOS DEL PRESTAMO --}}
        <label for="inputDateFechaPrestamo">Fecha del prestamo</label>
        <input type="date" name="inputDateFechaPrestamo" id="inputDateFechaPrestamo">

        <label for="inpuDateFechaDevolucion">Fecha devolución</label>
        <input type="date" name="inpuDateFechaDevolucion" id="inpuDateFechaDevolucion">

        @if ($libro->disponible === 1)
        <input type="submit" value="REALIZAR PRESTAMO">
        @else
        <p>No se puede realizar ningun prestamo por que no esta disponible este libro</p>
        @endif
        
        
    </form>
@endsection