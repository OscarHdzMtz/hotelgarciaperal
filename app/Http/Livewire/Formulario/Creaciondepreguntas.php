<?php

namespace App\Http\Livewire\Formulario;

use App\Models\addformularios;
use App\Models\preguntasformularios;
use Livewire\Component;
use Livewire\WithFileUploads;

class Creaciondepreguntas extends Component
{
    use WithFileUploads;
    public $idformulario;
    public $descripcionInput;
    public $nombreInput;
    public $imgformulario;

    public $preguntasFormulario;
    /* preguntas */
    /* public $checkboxobligatorio = 0; */
    /* public $idpregunta; */
    
   /*  public function getId($idPreg){
        $this->idpregunta = $idPreg;
        return $idPreg;
    }  */   

    public function mount(){
        $this->preguntasFormulario = preguntasformularios::where('formulario_id', $this->idformulario)->get();
    }

    public function agregarPregunta(){    
        $numero_aleatorio = rand(1,5);    
        $componenteGeneradoAleatorio = $this->componenteAleatorio($numero_aleatorio);
       $addPreguntas = new preguntasformularios();
       $addPreguntas->formulario_id = $this->idformulario;
       $addPreguntas->pregunta = "";
       $addPreguntas->tipodecomponente = $componenteGeneradoAleatorio;
       $addPreguntas->valordecomponente = "malo|bueno|excelente";
       $addPreguntas->numerodecomponente = 3;
       $addPreguntas->campoobligatorio = false;              
       $addPreguntas->save();
       toastr()->success('Agregado correctamente!', 'NUEVA PREGUNTA');
    }
  /*   public function actualizarPregunta($idpregunta, $checkboxobligatorio){
        $getPregunta = preguntasformularios::findOrFail($idpregunta);
        $getPregunta->campoobligatorio =  $checkboxobligatorio;   
        $getPregunta->update();
        toastr()->success('Actualizados correctamente!', 'DATOS');
    } */

    public function borrarPregunta($id){
        $buscarPreguntarBorrar = preguntasformularios::findOrFail($id);
        $buscarPreguntarBorrar->delete();
        toastr()->error('¡Pregunta eliminado!', '¡ELIMINADO!');
    }

    public function render()
    {        
       /*  if ($this->idpregunta != null) {
            $this->actualizarPregunta($this->idpregunta, $this->checkboxobligatorio);
        }        
 */
       /*  $prueba = $this->checkboxobligatorio; */

        $getDateFormulario = $this->obtenerDatosFormulario($this->idformulario);
        //VALIDAMOS SI NO HAY CAMBIOS EN DESCRIPCION Y NOMBRE DEL FORMULARIO PARA OBTENER SU VALORES
        if ($this->descripcionInput === null or $this->nombreInput === null or $this->imgformulario === null) {
            $this->descripcionInput = $getDateFormulario[0]['descripcion'];
            $this->nombreInput = $getDateFormulario[0]['nombre'];
            $this->imgformulario = $getDateFormulario[0]['img'];
        }

        $this->updateDatosFormulario($this->idformulario, $this->descripcionInput, $this->nombreInput, $this->imgformulario);
        $getAllPreguntas = preguntasformularios::where('formulario_id', $this->idformulario)->get();                
        return view('livewire.formulario.creaciondepreguntas', compact('getDateFormulario', 'getAllPreguntas'));
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
    public function updateDatosFormulario($idformulario, $descripcionInput, $nombreInput, $imgformulario)
    {
        $nameFormulario = addformularios::findOrFail($idformulario);
        $prueba = $nameFormulario->nombre;
        if ($descripcionInput != $nameFormulario->descripcion or $nombreInput != $nameFormulario->nombre or $imgformulario != $nameFormulario->img) {
            $nameFormulario->descripcion = $descripcionInput;
            $nameFormulario->nombre = $nombreInput;
            if($this->imgformulario != null and $this->imgformulario != $nameFormulario->img){ 
                $imageName = $imgformulario->store("images",'public');                
                $nameFormulario->img = $imageName;
            }                        
            $nameFormulario->update();
            toastr()->success('Actualizados correctamente!', 'DATOS');
        }                 
    }     
    public function componenteAleatorio($numero_aleatorio){
      switch ($numero_aleatorio) {
        case 1:
            return "input";
            break;
        case 2;
            return "textarea";
            break;
        case 3;
            return "checkbox";
            break;
        case 4;
            return "radio";
            break;
        case 5;
            return "select";
            break;
        default:
            # code...
            break;
      }
        
    }  
}
