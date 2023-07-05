<?php

namespace App\Http\Livewire\Formulario;

use App\Models\addformularios;
use App\Models\preguntasformularios;
use App\Models\respuestasformularios;
use Livewire\Component;
use PhpParser\Node\Expr\New_;

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

    public function finalizarRegistroFormulario(){
        $getformulario = new respuestasformularios();
        $getformulario->wireidporregistro = $this->id;
        $getformulario->wireidporpregunta = 0;
        $getformulario->pregunta_id = 0;
        $getformulario->formulario_id = $this->idformulario;
        $getformulario->statusRegistro = "completado";
        $getformulario->save();
    }
}