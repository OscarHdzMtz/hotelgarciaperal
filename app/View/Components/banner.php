<?php

namespace App\View\Components;

use Illuminate\View\Component;

class banner extends Component
{
    public $nameImg;    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nameImg)
    {
        //
        $this->nameImg = $nameImg;        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.banner');
    }
}
