<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class prestamosController extends Controller
{
    //
    public function displayPrestamos()
    {
        return view('prestamos.prestamos');
    }

    public function addPrestamo()
    {
        return view('prestamos.prestamos-form-add');
    }
}
