<?php

namespace App\Http\Livewire\Formulario;

use Livewire\Component;
use App\Models\addformularios;

class Showformulario extends Component
{    
    public function deleteFormulario($idform){
        /* CONSULTAMOS EL FORMULARIOS SELECCIONADO Y LO CONSULTAMOS EN LA BD */
        $formdelte = addformularios::where('id', $idform);
        /* ELIMINAMOS EL FORMULARIO CONSULTADO */
        $formdelte->delete();
    }
    public function render()
    {        
        $getformularios = addformularios::all();
        return view('livewire.formulario.showformulario', compact('getformularios'));
    }    
}
