<?php

namespace App\Http\Livewire\Formulario;

use App\Models\addformularios;
use App\Models\preguntasformularios;
use Livewire\Component;

class Showformsclientes extends Component
{
    public $idformulario;

    /* public $respuestaInput; */

    public $preguntasFormulario;
    public $wireidporregistro;
    public function mount(){
        $this->preguntasFormulario = preguntasformularios::where('formulario_id', $this->idformulario)->get();
        $this->wireidporregistro = $this->id;
    }
    public function render()
    {
        /* $prueba = $this->respuestaInput; */
        $getDatosFormulario = addformularios::where('id', $this->idformulario)->get();
        /* $getPreguntasFormulario = preguntasformularios::where('formulario_id', $this->idformulario)->get(); */
        return view('livewire.formulario.showformsclientes', compact(/* 'getPreguntasFormulario', */ 'getDatosFormulario'));
    }
}