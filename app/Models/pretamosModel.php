<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;

class pretamosModel extends Model
{
    protected $table = 'prestamos';
    use HasFactory;

    public function libro()
    {
        return $this->belongsTo(librosModel::class, 'libro_id');
    }


    public static function allPrestamos()
    {

        $prestamos = pretamosModel::all();
        
        return $prestamos;
    }

    public static function addPrestamo(Request $request, $id)
    {
        $prestamo = new pretamosModel();
        $prestamo->libro_id = $id;
        $prestamo->fecha_prestamo = Carbon::parse($request->input('inputDateFechaPrestamo'));
        $prestamo->fecha_devolucion = Carbon::parse($request->input('inpuDateFechaDevolucion'));
        $prestamo->finalizado = false;
        $prestamo->save();
    }
}
