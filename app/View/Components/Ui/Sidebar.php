<?php

namespace App\View\Components\Ui;

use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Desktop Sidebar
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
        return view('components.ui.sidebar');
    }
}
