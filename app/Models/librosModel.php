<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\prestamosModel;

class librosModel extends Model
{
    /**
     * CON LA VARIABLE $table identificamos el nombre de la tabla a la que hace referencia en la BD.
     */
    protected $table = 'libros';
    protected $primaryKey = 'id';
    use HasFactory;

/**
 * establecemos las relaciones con las otras tablas si hay
 */

    public function prestamos()
    {
        return $this->hasMany(prestamosModel::class,'libros_id');
    }

    /**
     * METODO, PERMITE CREAR UN NUEVO LIBRO EN LA BD
     */
    public function newBook(Request $request)
    {
        $book = new librosModel();
        $book->isbn = $request->input('inputIsbnBook');
        $book->titulo = $request->input('inputTituloBook');
        $book->autor = $request->input('inputAutorBook');
        $book->año_publicacion = Carbon::parse($request->input('inputPublicacionBook'));
        $book->genero = $request->input('inputGeneroBook');
        if ($request->input('selectDisponibilidadBook') === 'true') {
            //EN BD SERIA TRUE SERIA 1
            $book->disponible = true;
        } else {
            //EN BD SERIA FALSE 0
            $book->disponible = false;
        }
        $book->save();
    }

    //Me devuelve todos los libros que hay en la BD
    public function displayAllBooks()
    {
        return librosModel::all();
    }

    /**
     * METODO QUE PERMITE ELIMINAR UN LIBRO
     */
    public function deleteBook($id)
    {
        $book = librosModel::find($id);
        $book->delete();
    }

    /**
     * METODO QUE PERMITE ACTUALIZAR LOS DATOS DEL LIBRO EN LA BD
     */
    public function obtenerDatosLibro($id){
        $book = librosModel::find($id);
        return $book;
    }
    public function updateLibro(Request $request, $id)
    {
        $book = librosModel::find($id);
        $book->isbn = $request->input('inputIsbnBook');
        $book->titulo = $request->input('inputTituloBook');
        $book->autor = $request->input('inputAutorBook');
        $book->año_publicacion = Carbon::parse($request->input('inputPublicacionBook'));
        $book->genero = $request->input('inputGeneroBook');
        if ($request->input('selectDisponibilidadBook') === 'true') {
            //EN BD SERIA TRUE SERIA 1
            $book->disponible = true;
        } else {
            //EN BD SERIA FALSE 0
            $book->disponible = false;
        }
        $book->save();

    }

    public function updateEstadoDisponibilidadfalse($id)
    {
        $book = librosModel::find($id);
        $book->disponible = false;
        $book->save();
    }
    public function updateEstadoDisponibilidadtrue($id)
    {
        $book = librosModel::find($id);
        $book->disponible = true;
        $book->save();
    }

    public function searchIsbnOrTitle(Request $request)
    {
        $book = librosModel::where('titulo','like','%'.$request->input('inputBuscarLibro').'%')
                ->orWhere('isbn','=',$request->input('inputBuscarLibro'))
                ->get();
        return $book;
    }
}