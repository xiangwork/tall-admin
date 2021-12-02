<?php

namespace App\View\Components\Ui;

use Illuminate\View\Component;

class Alert extends Component
{
    public $autoClose = true;

    public function __construct($autoClose=true)
    {
        $this->autoClose = $autoClose;
    }

    public function render()
    {
        return view('components.ui.alert');
    }
}
