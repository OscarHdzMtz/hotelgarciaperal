<?php

namespace App\Http\Livewire\Formulario;

use Livewire\Component;
use App\Models\addformularios;

class Showformulario extends Component
{    
    public function deleteFormulario($idform){
        /* CONSULTAMOS EL FORMULARIOS SELECCIONADO Y LO CONSULTAMOS EN LA BD */
        $formdelete = addformularios::where('id', $idform);

        $nombreFormularioEliminar = $this->getNombreFormBorrar($idform);

        /* ELIMINAMOS EL FORMULARIO CONSULTADO */        
        $formdelete->delete();
        
        toastr()->warning('¡Eliminado correctamente!', $nombreFormularioEliminar);
    }
    public function render()
    {        
        $getformularios = addformularios::all();
        return view('livewire.formulario.showformulario', compact('getformularios'));
    }   
     
    public function getNombreFormBorrar($id){
        /* hacemos la consulta con el id */
        $consformDelete = addformularios::where('id', $id)->get();
        /* lo convertimos en array */
        $formdelteNomArray = $consformDelete->toArray();
        /* obtenemos el nombre */
        $formdelteNombre = $formdelteNomArray[0]['nombre'];
        /* retornamos el mombre */
        return $formdelteNombre;
    }
}
