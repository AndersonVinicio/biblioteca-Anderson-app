<?php

namespace App\Http\Controllers;

use App\Models\librosModel;
use App\Models\pretamosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class prestamosController extends Controller
{
    //
    public function displayPrestamos()
    {
        $prestamos = pretamosModel::allPrestamos();
        $librosPrestados = [];
        foreach ($prestamos as $prestamo) {
            $libroRelacionado = $prestamo->libro; 
            $titulo = $libroRelacionado->titulo;
            $isbn = $libroRelacionado->isbn;
            $datosPrestamo = $prestamo;

            $librosPrestados[] = [
                'titulo' => $titulo,
                'isbn' => $isbn,
                'datosPrestamo'=>$datosPrestamo
            ];
        }
        return view('prestamos.prestamos', compact('librosPrestados'));
    }

    public function displayFormPrestamo($id)
    {
        $libro = librosModel::obtenerDatosLibro($id);
        Session::flash('id', $id);
        return view('prestamos.prestamos-form-add', compact('libro'));
    }

    public function realizarPrestamo(Request $request)
    {
        $id = Session::get('id');
        librosModel::updateEstadoDisponibilidad($id);
        pretamosModel::addPrestamo($request, $id);
        return redirect()->route('displayPrestamos');
    }
}
