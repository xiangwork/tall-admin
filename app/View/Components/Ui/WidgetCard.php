<?php

namespace App\View\Components\Ui;

use Illuminate\View\Component;

class WidgetCard extends Component
{
    public $title;
    public $number;


    public function __construct($title, $number)
    {
        $this->title = $title;
        $this->number = number_format($number,0, ",", ".");
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ui.widget-card');
    }
}
