<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class LocationPicker extends Component
{
    public $location;

    public function __construct($location)
    {
        $this->location = $location;
    }

    public function render()
    {
        return view('components.input.location-picker');
    }
}
