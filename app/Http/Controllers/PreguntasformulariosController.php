<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Formulario\Createformulario;
use App\Models\addformularios;
use App\Models\preguntasformularios;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PreguntasformulariosController extends Controller
{
    public function update(Request $request){        
        $pregunta_id = $request->pregunta_id;
        $formulario_id = $request->formulario_id;
        /* $formulario_pregunta = preguntasformularios::where('id', $pregunta_id)->where('formulario_id', $formulario_id); */
        $formulario_pregunta = preguntasformularios::findorfail($pregunta_id);
        $consultaTableFormulario = addformularios::where('id', $formulario_id)->get()->toArray();
        $nombreFormulario = $consultaTableFormulario[0]['id'];
        $formulario_pregunta->pregunta = $request->pregunta;
        $formulario_pregunta->tipodecomponente = $request->tipodecomponente;
        $formulario_pregunta->campoobligatorio = $request->obligatorio;

        $valordecomponente = $request->valordecomponente;
        $valordecomponenteLimpio = str_replace(",", '|', $valordecomponente);
        $formulario_pregunta->valordecomponente = $valordecomponenteLimpio;        
        $valordecomponenteArray = explode('|', $valordecomponenteLimpio);

        $formulario_pregunta->numerodecomponente = count($valordecomponenteArray);

        $formulario_pregunta->update();                 
        toastr()->success('Actualizados correctamente!', 'DATOS');
                
    }    
}
