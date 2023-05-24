<?php

namespace App\Http\Livewire\Formulario;

use App\Models\addformularios;
use Livewire\Component;

class Creaciondepreguntas extends Component
{
    public $idformulario;
    public $descripcionInput;
    public $nombreInput;

    public function render()
    {
        $getDateFormulario = $this->obtenerDatosFormulario($this->idformulario);
        //VALIDAMOS SI NO HAY CAMBIOS EN DESCRIPCION Y NOMBRE DEL FORMULARIO PARA OBTENER SU VALORES

        if ($this->descripcionInput === null or $this->nombreInput === null) {
            $this->descripcionInput = $getDateFormulario[0]['descripcion'];
            $this->nombreInput = $getDateFormulario[0]['nombre'];
        }

        $this->updateDatosFormulario($this->idformulario, $this->descripcionInput, $this->nombreInput);

        return view('livewire.formulario.creaciondepreguntas', compact('getDateFormulario'));
    }

    /* OBTIENE LOS DATOS DEL FORMULARIO QUE SE ESTA EDITANDO ACTUALMENTE */
    public function obtenerDatosFormulario($idformulario)
    {
        $idformulario = $this->idformulario;
        $dateformulario = addformularios::where('id', $idformulario)->get();
        /* $getnombreformularioarray = $getnombreformulario->toarray();
        $nombreimg = $getnombreformularioarray[0]['img']; */
        return $dateformulario;
    }

    /* ACTUALIZA LOS DATOS DEL FORMULARIO CUANDO DETECTA CAMBIOS(Nombre, Descripcion) */
    public function updateDatosFormulario($idformulario, $descripcionInput, $nombreInput)
    {
        $nameFormulario = addformularios::findOrFail($idformulario);
        $prueba = $nameFormulario->nombre;
        if ($descripcionInput != $nameFormulario->descripcion or $nombreInput != $nameFormulario->nombre) {
            $nameFormulario->descripcion = $descripcionInput;
            $nameFormulario->nombre = $nombreInput;
            $nameFormulario->update();
            toastr()->success('Actualizados correctamente!', 'DATOS');
        }
    }
}
