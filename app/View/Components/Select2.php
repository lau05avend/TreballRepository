<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select2 extends Component
{
    public $options;
    public $stylee;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options, $stylee = ""){
        $this->options = $options;
        $this->stylee = $stylee;
    }
    // public function __construct(){
    // }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select2');
    }
}
