<?php

namespace App\View\Components;

use App\Models\preguntasformularios;
use Illuminate\View\Component;

class divpreguntas extends Component
{
    public $allPreguntas;
    /**
     * Create a new component instance.
     *
     * @return void
     */    

    public function __construct($allPreguntas)
    {
        //
        $this->allPreguntas=$allPreguntas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {        
        return view('components.divpreguntas');
    }
}
