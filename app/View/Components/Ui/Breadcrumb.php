<?php

namespace App\View\Components\Ui;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public array $breadcrumbs;


    public function __construct($breadcrumbs)
    {
        $this->breadcrumbs = $breadcrumbs;
    }


    public function render()
    {
        return view('components.ui.breadcrumb');
    }
}
