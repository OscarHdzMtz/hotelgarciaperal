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

    public $mostrarModalFinalFormulario = false;
    public $puntuacionTotalParaModal = 0.0;

    public function mount()
    {
        $this->preguntasFormulario = preguntasformularios::where('formulario_id', $this->idformulario)->get();
        $this->wireidporregistro = $this->id;
    }
    public function render()
    {
        $temp = $this->wireidporregistro;
        $getDatosFormulario = addformularios::where('id', $this->idformulario)->get();

        /* OBTIENE LA PUNTUACION FINAL PARA EL DE MODAL FINAL */
        $this->puntuacionTotalParaModal = $this->consultarPorcentajePorPregunta();

        return view('livewire.formulario.showformsclientes', compact(/* 'getPreguntasFormulario', */'getDatosFormulario'));
    }

    public function finalizarRegistroFormulario()
    {
        $getformulario = new respuestasformularios();
        $getformulario->wireidporregistro = $this->id;
        $getformulario->wireidporpregunta = 0;
        $getformulario->pregunta_id = 0;
        $getformulario->formulario_id = $this->idformulario;
        $getformulario->statusRegistro = "completado";
        $getformulario->puntuaciontotal = $this->consultarPorcentajePorPregunta();
        $getformulario->save();
        $this->mostrarModalFinalFormulario = true;
        /* toastr()->success('¡Enviado correctamente!', ''); */
    }
    function consultarPorcentajePorPregunta()
    {
        $consult_respuestas = respuestasformularios::where('wireidporregistro', $this->id)
            ->where('puntuacionporregistro', '>', 0)->get()->toArray();

        if (count($consult_respuestas) > 0) {
            $sumaDepuntuacionesPorRespuesta = 0.0;
            $puntuacionTotal = 0.0;
            for ($sumarPuntuacion = 0; $sumarPuntuacion < count($consult_respuestas); $sumarPuntuacion++) {
                $sumaDepuntuacionesPorRespuesta = $sumaDepuntuacionesPorRespuesta + $consult_respuestas[$sumarPuntuacion]['puntuacionporregistro'];
            }
            $puntuacionTotal = $sumaDepuntuacionesPorRespuesta / count($consult_respuestas);
            return $puntuacionTotal;
        }
    }
}
