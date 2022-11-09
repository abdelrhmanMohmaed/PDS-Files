<?php

namespace App\View\Components;

use App\Models\Machine as ModelsMachine;
use Illuminate\View\Component;

class machine extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $machines = ModelsMachine::get();
        return view('components.machine', compact('machines'));
    }
}
