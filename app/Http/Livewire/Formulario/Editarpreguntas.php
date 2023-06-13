<?php

namespace App\Http\Livewire\Formulario;

use App\Models\preguntasformularios;
use Livewire\Component;

class Editarpreguntas extends Component
{
    public $idpregunta;
    public $valuepregunta;
    public $pregunta;

    public function mount(preguntasformularios $pregunta){        
        $this->pregunta = $pregunta;
    }
    public function editarPreguta(){
        $prueba = $this->valuepregunta;
    }

    public function render()
    {
        $prueba = $this->valuepregunta;
        return view('livewire.formulario.editarpreguntas'/*  , compact('idpregunta', 'getpregunta' ) */);
    }    
}
