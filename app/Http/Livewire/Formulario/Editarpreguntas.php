<?php

namespace App\Http\Livewire\Formulario;

use App\Models\preguntasformularios;
use Livewire\Component;

class Editarpreguntas extends Component
{
    public $idpregunta;
    public $valuepregunta;


    public function editarPregunta($getpregunta, $valuepregunta){
        $updatepregunta = preguntasformularios::findOrFail($this->idpregunta);
        if ($getpregunta[0]['pregunta'] != $valuepregunta) {            
            $updatepregunta->pregunta = $valuepregunta;
            $updatepregunta->update();
        }
    }
    public function borrarPregunta($id){
        $buscarPreguntarBorrar = preguntasformularios::findOrFail($id);
        $buscarPreguntarBorrar->delete();
        toastr()->error('¡Pregunta eliminado!', '¡ELIMINADO!');
    }

    public function render()
    {
        $idpregunta = $this->idpregunta;
        $getpregunta = preguntasformularios::where('id', $idpregunta)->get();
        if ($this->valuepregunta === null)  {
            
           $this->valuepregunta = $getpregunta[0]['pregunta'];
        }
        $this->editarPregunta($getpregunta,$this->valuepregunta);

        return view('livewire.formulario.editarpreguntas' , compact('idpregunta', 'getpregunta' ));
    }    
}
