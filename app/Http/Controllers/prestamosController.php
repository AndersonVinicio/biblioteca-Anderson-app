<?php

namespace App\Http\Controllers;

use App\Models\librosModel;
use App\Models\pretamosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class prestamosController extends Controller
{
    //


    protected $prestamosModel;
    protected $librosModel;

    public function __construct(pretamosModel $prestamosModel, librosModel $librosModel=null)
    {
        $this->prestamosModel = $prestamosModel;
        $this->librosModel = $librosModel;
    }

    

    public function displayPrestamos()
    {
        $prestamos = $this->prestamosModel->prestamosUser();
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
        $libro = $this->librosModel->obtenerDatosLibro($id);
        Session::flash('id', $id);
        return view('prestamos.prestamos-form-add', compact('libro'));
    }

    public function realizarPrestamo(Request $request)
    {
        $id = Session::get('id');
        $this->librosModel->updateEstadoDisponibilidadfalse($id);
        $this->prestamosModel->addPrestamo($request, $id);
        return redirect()->route('displayPrestamos');
    }

    public function finalizarPrestamo($id)
    {
        $prestamo = pretamosModel::find($id);
        $libroRelacionado = $prestamo->libro;
        $id_libro=$libroRelacionado->id;
        $this->librosModel->updateEstadoDisponibilidadtrue($id_libro);
        $this->prestamosModel->updateEstadoPrestamo($id);
        return redirect()->route('displayPrestamos');
    }
}
