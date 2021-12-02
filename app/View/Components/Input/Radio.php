<?php

namespace App\View\Components\Input;

use App\View\Components\Traits\RadioOptionsTrait;
use Illuminate\View\Component;

class Radio extends Component
{
    use RadioOptionsTrait;

    public string $method;

    public string $value;

    public string $text;

    public array $options; //json string

    public string $placeholder;

    public function __construct($method)
    {
        $this->method = $method;
    }


    public function render()
    {
        $method = $this->method;
        if (!method_exists($this, $method)) {
            abort(403, "No Method Exists On Radio Trait");
        }

        $this->options = $this->{$method}();

        return view('components.input.radio');
    }
}
