<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\librosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class librosController extends Controller
{

    //METODOS PARA MOSTRAR LAS VISTAS

    public function displayBooks()
    {
        $libros = librosModel::displayAllBooks();
        return view('libros.libros',compact('libros'));
    }

    public function AddBook()
    {
        return view('libros.libros-form-add');
    }

    public function viewEditLibro($id){
        $libro = librosModel::obtenerDatosLibro($id);
        //GUARDAMOS EL ID EN SESSION PARA UN SOLO USO
        Session::flash('id', $id);
        return view('libros.libros-edit', compact('libro'));
    }

    public function viewDetallesLibro($id){
        $libro = librosModel::obtenerDatosLibro($id);
        return view('libros.libro-mas-detalles',compact('libro'));
    }
    /**
     * METODO DE LA CLASE LIBROSCONTROLLER DE LIBROS QUE LLAMA AL METODO DE GUARDAR EN LA BD DEL MODELO
     */
    public function addLibro(Request $request)
    {
        // $book_id = 1;
        // $titulo = 'Harry Potter';
        // $autor = 'autor prueba';
        // $año_publicacion = Carbon::parse('2023-08-07');
        // $genero = 'animacion';
        // $disponible = true;
        librosModel::newBook($request);
        return redirect()->route('displayLibros');
    }

    /**
     * METODO DE LA CLASE CONTROLLER QUE NOS PERMITE ELIMINAR UN LIBRO
     */
    public function deleteBook($id)
    {
        librosModel::deleteBook($id);
        return redirect()->route('displayLibros');
    }

    /** 
     * METODO QUE SIRVE PARA ACTUALIZAR UN LIBRO 
     */
    public function updateLibro(Request $request)
    {
        //OBTENEMOS EL ID DE LA SSESION
        $id = Session::get('id');
        librosModel::updateLibro($request, $id);
        return redirect()->route('displayLibros');
    }

    /**
     * METODO PARA BUSCAR UN LIBRO MEDIANTE ID O NOMBRE DEL LIBRO
     */

    public function searchBook(Request $request)
    {
        $libros = librosModel::searchIsbnOrTitle($request);
        return view('libros.libros',compact('libros'));
        
    }

    // ACTUALIZACION DE ESTADO DISPONIBLE EN BD

    public function updtateEstadoDisponibilidad($id)
    {
        librosController::updtateEstadoDisponibilidad($id);
    }
}