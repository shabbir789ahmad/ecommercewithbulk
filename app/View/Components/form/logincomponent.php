<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class logincomponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $route;
    public function __construct($route)
    {
        $this->route=$route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.logincomponent',['route'=>$this->route]);
    }
}
