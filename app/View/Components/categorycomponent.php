<?php

namespace App\View\Components;

use Illuminate\View\Component;

class categorycomponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $subcategories;
    public function __construct($subcategories)
    {
        $this->subcategories=$subcategories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.categorycomponent',['subcategories'=>$this->subcategories]);
    }
}
