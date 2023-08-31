<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\librosModel;

class TablaLibros extends Component
{
    public $libros;
    public $buscar;

    

    public function render()
    {
        $this->libros = librosModel::all();
        return view('livewire.tabla-libros');
    }

    public function buscarIsbnOrTitle()
    {
        $this->libros=librosModel::searchIsbnOrTitle($this->buscar);

    }
}
