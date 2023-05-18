<?php

namespace App\Http\Livewire\Formulario;

use App\Models\addformularios;
use Livewire\Component;
use Livewire\WithFileUploads;

class Createformulario extends Component
{
    use WithFileUploads;
    public $nombre = "";
    public $descripcion = "";
    public $img;
    public $open = true;

   /*  protected $rules =[
        'nombre' => "required|min:2|max10",
        'descripcion' => "required|min:2|max10",
        'imagen' => "required|image|mimes:jpeg,png,svg,jpg,gif"
    ]; */
   

    public function submit(){
        $validatedDate = $this->validate([
            'nombre' => "required|min:2|max:10",
            'descripcion' => "required|min:2|max:10",
            /* 'img' => 'image|max:2000', */
        ]);
        $prueba = $this->img;
        if($this->img != null){            
            $imageName = $this->img->store("images",'public');
            $validatedDate['img'] = $imageName;
        }else{
            $validatedDate['img'] = "";
        }
        
        
        addformularios::create($validatedDate);
        return redirect('addformulario')->with('varsession', 'Formulario Agregado');
    }
    public function render()
    {
        return view('livewire.formulario.createformulario');
    }

    public function abrirModal(){
        $this->open = true;
    }
    public function cerrarModal(){
        $this->open = false;
    }
}
