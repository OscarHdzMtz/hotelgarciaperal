<?php

namespace App\Http\Livewire\Formulario;

use Livewire\Component;
use App\Models\preguntasformularios;
use App\Models\respuestasformularios;

class Respuestasformulario extends Component
{
    public $preguntas;
    public $respuestaInput;

    public $wireidporregistro; //WIRE ID QUE SE GUARDARA POR CADA REGISTRO PARA DIFERENCIAR

    public function mount(preguntasformularios $preguntas, $wireidporregistro)
    {
        $this->preguntas = $preguntas;
        $this->wireidporregistro = $wireidporregistro;
    }
    public function render()
    {
        $pregunta_id = $this->preguntas->id;
        $formulario_id = $this->preguntas->formulario_id;
        $prueba = $this->respuestaInput;
        $wireidporpregunta = $this->id; //WIRE ID QUE SE GUARDARA POR PREGUNTA PARA NO REPETIR Y PODER ACTUALIZAR PREGUNTA CONSULTAR POR REGISTRO
        if ($this->respuestaInput != null) {
            $this->insertarRespuestas(
                $formulario_id,
                $pregunta_id,
                $wireidporpregunta
            );
        }

        return view("livewire.formulario.respuestasformulario");
    }

    public function insertarRespuestas(
        $formulario_id,
        $pregunta_id,
        $wireidporpregunta
    ) {
        $ConsultarWireId = respuestasformularios::where(
            "wireidporpregunta",
            $wireidporpregunta
        )
            ->get()
            ->toArray();
        if (count($ConsultarWireId) >= 1) {
            $wireidConsultado = $ConsultarWireId[0]["id"];
            $respuestaActualizar = respuestasformularios::findOrFail(
                $wireidConsultado
            );
            $respuestaActualizar->wireidporregistro = $this->wireidporregistro;
            $respuestaActualizar->respuesta = $this->respuestaInput;
            $respuestaActualizar->update();
            toastr()->warning("Actualizados correctamente!", "DATOS");
        } else {
            $respuestas = new respuestasformularios();
            $respuestas->wireidporpregunta = $wireidporpregunta;
            $respuestas->wireidporregistro = $this->wireidporregistro;
            $respuestas->formulario_id = $formulario_id;
            $respuestas->pregunta_id = $pregunta_id;
            $respuestas->respuesta = $this->respuestaInput;
            $respuestas->save();
            toastr()->success("Correctamente", "GUARDADO");
        }
    }

    public function guardarValorComponenteRadio(string $valorcomponenteRecibido)
    {
        $pregunta_id = $this->preguntas->id;
        $formulario_id = $this->preguntas->formulario_id;

        $wireidporpregunta = $this->id;
        $ConsultarWireId = respuestasformularios::where(
            "wireidporpregunta",
            $wireidporpregunta
        )
            ->get()
            ->toArray();
        if (count($ConsultarWireId) >= 1) {
            $wireidConsultado = $ConsultarWireId[0]["id"];
            $respuestaActualizar = respuestasformularios::findOrFail(
                $wireidConsultado
            );
            $respuestaActualizar->wireidporregistro = $this->wireidporregistro;
            $respuestaActualizar->respuesta = $valorcomponenteRecibido;
            $respuestaActualizar->update();
            toastr()->warning("Actualizados correctamente!", "DATOS");
        } else {
            $respuestas = new respuestasformularios();
            $respuestas->wireidporpregunta = $wireidporpregunta;
            $respuestas->wireidporregistro = $this->wireidporregistro;
            $respuestas->formulario_id = $formulario_id;
            $respuestas->pregunta_id = $pregunta_id;
            $respuestas->respuesta = $valorcomponenteRecibido;
            $respuestas->save();
            toastr()->success("Correctamente", "GUARDADO");
        }
    }
}
