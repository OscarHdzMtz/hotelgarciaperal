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
            'nombre' => "required|min:2",
            'descripcion' => "min:2",
            /* 'img' => 'image|max:2000', */
        ]);

        if($this->img != null){            
            $imageName = $this->img->store("images",'public');
            $validatedDate['img'] = $imageName;
        }else{
            $validatedDate['img'] = "";
        }                        
        $nomformularios = $validatedDate['nombre'];

        addformularios::create($validatedDate);

        toastr()->success('¡Creado correctamente!', $nomformularios);
        
        return redirect('addformulario');
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
