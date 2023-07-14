<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\preguntasformularios;
use App\Models\respuestasformularios;

class DashboardformulariosController extends Controller
{
    //
    
    public function create(int $id,string $nombre){
        $totalDePreguntas = preguntasformularios::where('formulario_id', $id)->count();
        $totalDeRespuestasFinalizadas = respuestasformularios::where('formulario_id', $id)
                                            ->where('statusRegistro', 'completado')->count(); 
                                            
    $totalDeRespuestasNoFinalizadas = $this->totalRespuestasNoFinalizadas($id);
        return view('pages.formularios.dashboard.dashboardformularios', compact('id','nombre', 'totalDePreguntas', 'totalDeRespuestasFinalizadas', 'totalDeRespuestasNoFinalizadas'));        
    }

    public function totalRespuestasNoFinalizadas($id){
        $totalDeRespuestasFinalizadas = respuestasformularios::where('formulario_id', $id)
        ->get()->toArray();        
        $totalRespuestasNofinalizadasArray = [];
        $arrayBaseRecorrer = $totalDeRespuestasFinalizadas;
        for ($recorrer=0; $recorrer < count($arrayBaseRecorrer); $recorrer++) { 
            $wireidregistroRecorrdio = $arrayBaseRecorrer[$recorrer]['wireidporregistro'];
            $arrayBaseBuscar = $totalDeRespuestasFinalizadas;
            for ($buscarNofinalizados=0; $buscarNofinalizados < count($arrayBaseBuscar); $buscarNofinalizados++) { 
                $wireidregistrobuscando = $arrayBaseBuscar[$buscarNofinalizados]['wireidporregistro'];
                $wireidPreguntaBuscando = $arrayBaseBuscar[$buscarNofinalizados]['wireidporpregunta'];
                $statusRegistro = $arrayBaseBuscar[$buscarNofinalizados]['statusRegistro'];
                if ($wireidregistroRecorrdio == $wireidregistrobuscando AND $wireidPreguntaBuscando == 0) {
                    break;
                }   
                $countArray = count($arrayBaseBuscar)-1;
                if ($buscarNofinalizados == $countArray AND $wireidregistroRecorrdio <> $wireidregistrobuscando) {
                    $totalRespuestasNofinalizadasArray[] = $wireidregistroRecorrdio;   
                }            
            }
        }
        $borrarDuplicado = array_unique($totalRespuestasNofinalizadasArray);
        $totalDeRespuestasNoFinalizadas = $borrarDuplicado;
        return count($totalDeRespuestasNoFinalizadas);
    }
}
