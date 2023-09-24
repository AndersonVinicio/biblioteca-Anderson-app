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

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function allPrestamos()
    {

        $prestamos = pretamosModel::all();
        return $prestamos;
    }

    public function prestamosUser()
    {
        $prestamos = pretamosModel::where('user_id','=',auth()->user()->id)->get();
        return $prestamos;
    }

    public function addPrestamo(Request $request, $id)
    {
        $prestamo = new pretamosModel();
        $prestamo->libro_id = $id;
        $prestamo->user_id = auth()->user()->id;
        $prestamo->fecha_prestamo = Carbon::parse($request->input('inputDateFechaPrestamo'));
        $prestamo->fecha_devolucion = Carbon::parse($request->input('inpuDateFechaDevolucion'));
        $prestamo->finalizado = false;
        $prestamo->save();
    }

    public function updateEstadoPrestamo($id)
    {
        
        $prestamo = pretamosModel::find($id);
        $prestamo->finalizado = true;
        $prestamo->save();
    }
}
