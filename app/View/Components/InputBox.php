<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $label;
    public $name;
    public $type;
    public $placeholder;
    public $sign;
    public $text;
    public function __construct($label,$name,$placeholder,$type,$sign=null,$text = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->sign = $sign;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-box');
    }
}