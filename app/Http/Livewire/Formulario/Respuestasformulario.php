<?php

namespace App\Http\Livewire\Formulario;

use Livewire\Component;
use App\Models\preguntasformularios;
use App\Models\respuestasformularios;

class Respuestasformulario extends Component
{
    public $preguntas;
    public $valoresRespuesta;
    public $valoresCheckbox = [];

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
        $prueba = $this->valoresCheckbox;
        $wireidporpregunta = $this->id; //WIRE ID QUE SE GUARDARA POR PREGUNTA PARA NO REPETIR Y PODER ACTUALIZAR PREGUNTA CONSULTAR POR REGISTRO
        if ($this->valoresRespuesta != null) {
            $this->insertarRespuestas(
                $formulario_id,
                $pregunta_id,
                $wireidporpregunta
            );
        }
        if ($this->valoresCheckbox != null) {
            $this->guardarValorComponenteCheckbox(
                $this->valoresCheckbox,
                $formulario_id,
                $pregunta_id
            );
        }

        /* OBTIENE EL PROMERO SI LA PREGUNTA TIENE ACTIVADO LA OPCION ASIGNARPROMEDIO */
        if ($this->preguntas->asignarpuntuacion === 1) {
            $obtenerPromedio = respuestasformularios::where('pregunta_id', $pregunta_id)->where('wireidporregistro', $this->wireidporregistro)->get()->toarray();
        } else {
            $obtenerPromedio = [];
        }

        return view("livewire.formulario.respuestasformulario", compact('obtenerPromedio'));
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
            $respuestaActualizar->respuesta = $this->valoresRespuesta;

            $respuestaActualizar->puntuacionporregistro = $this->puntucionDeLaRespuesta($this->valoresRespuesta);

            $respuestaActualizar->update();
            toastr()->warning("Actualizados correctamente!", "DATOS");
        } else {
            $respuestas = new respuestasformularios();
            $respuestas->wireidporpregunta = $wireidporpregunta;
            $respuestas->wireidporregistro = $this->wireidporregistro;
            $respuestas->formulario_id = $formulario_id;
            $respuestas->pregunta_id = $pregunta_id;
            $respuestas->respuesta = $this->valoresRespuesta;

            /* CALCULAR EL PROMEDIO POR PREGUNTA */
            $respuestas->puntuacionporregistro = $this->puntucionDeLaRespuesta($this->valoresRespuesta);

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

            /* RECCALCULAR EL PROMEDIO POR PREGUNTA */
            $respuestaActualizar->puntuacionporregistro = $this->puntucionDeLaRespuesta($valorcomponenteRecibido);

            $respuestaActualizar->update();
            toastr()->warning("Actualizados correctamente!", "DATOS");
        } else {
            $respuestas = new respuestasformularios();
            $respuestas->wireidporpregunta = $wireidporpregunta;
            $respuestas->wireidporregistro = $this->wireidporregistro;
            $respuestas->formulario_id = $formulario_id;
            $respuestas->pregunta_id = $pregunta_id;
            $respuestas->respuesta = $valorcomponenteRecibido;

            /* CALCULAR EL PROMEDIO POR PREGUNTA */
            $respuestas->puntuacionporregistro = $this->puntucionDeLaRespuesta($valorcomponenteRecibido);

            $respuestas->save();
            toastr()->success("Correctamente", "GUARDADO");
        }
    }
    public function guardarValorComponenteCheckbox(
        $valorcomponenteRecibido,
        $formulario_id,
        $pregunta_id
    ) {
        $prueba = $valorcomponenteRecibido;
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
            $respuestaActualizar->respuesta = $this->convertirValoresCheckboxArray(
                $valorcomponenteRecibido
            );
            $respuestaActualizar->update();
            toastr()->warning("Actualizados correctamente!", "DATOS");
        } else {
            $respuestas = new respuestasformularios();
            /* $this->convertirValoresCheckboxArray($valorcomponenteRecibido); */
            $respuestas->wireidporpregunta = $wireidporpregunta;
            $respuestas->wireidporregistro = $this->wireidporregistro;
            $respuestas->formulario_id = $formulario_id;
            $respuestas->pregunta_id = $pregunta_id;
            $respuestas->respuesta = $this->convertirValoresCheckboxArray(
                $valorcomponenteRecibido
            );
            $respuestas->save();
            toastr()->success("Correctamente", "GUARDADO");
        }
    }
    public function convertirValoresCheckboxArray($valorcomponenteRecibido)
    {
        $valoresComponenteString = "";

        foreach ($valorcomponenteRecibido as $key => $value) {
            if ($value != false) {
                $valoresComponenteString =
                    $valoresComponenteString . $value . "|";
            }
        }
        return $valoresComponenteString = substr(
            $valoresComponenteString,
            0,
            strlen($valoresComponenteString) - 1
        );
    }

    public function puntucionDeLaRespuesta($valorcomponenteRecibido)
    {
        if (is_numeric($valorcomponenteRecibido)) {
            $consult_pregunta = preguntasformularios::findOrfail($this->preguntas->id);
            $promedio = 0.0;
            /* validamos a que tipo de componentes obtenemos el promedio */
            if ($consult_pregunta->tipodecomponente === "radio" || $consult_pregunta->tipodecomponente === 'select') {
                /* OBTENERMOS EL NUMERO DE COMPONENTES */
                $valordecomponenteArray = explode("|", $consult_pregunta->valordecomponente);
                $promedio = round($valorcomponenteRecibido * 100 / count($valordecomponenteArray), 2);
            }
            return $promedio;
        }
    }
}
