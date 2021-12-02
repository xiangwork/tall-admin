<?php

namespace App\View\Components\Ui;

use Illuminate\View\Component;

class Tabs extends Component
{

    public array $headers;

    public function __construct($headers)
    {
        $this->headers = $headers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ui.tabs');
    }
}
