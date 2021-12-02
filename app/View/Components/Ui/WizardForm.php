<?php

namespace App\View\Components\Ui;

use Illuminate\View\Component;

class WizardForm extends Component
{
    public array $headers;

    public function __construct($headers)
    {
        $this->headers = $headers;
    }

    public function render()
    {
        return view('components.ui.wizard-form');
    }
}
