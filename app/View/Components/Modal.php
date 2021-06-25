<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public string $title;
    public string $dataTarget;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $dataTarget)
    {
        $this->title = $title;
        $this->dataTarget = $dataTarget;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
