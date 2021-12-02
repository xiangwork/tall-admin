<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public string $method;

    public string $text;

    public string $value;

    public string $options; //json string

    public string $placeholder;

    public function __construct($method)
    {
        $this->method = $method;
    }


    public function render()
    {
        $method = $this->method;
        if (!method_exists($this, $method)) {
            return responseJson("case method not exists");
        }
        $this->options = collect($this->{$method}())->toJson();

        return view('components.input.checkbox');
    }

    //your options query below

    private function bool()
    {
        $this->value = "value";
        $this->text = "text";
        $this->placeholder = "Please Select A Role ...";
        return [
            [
                "value" => true,
                "text" => "Ya",
            ],
            [
                "value" => false,
                "text" => "Tidak",
            ]
        ];
    }
}
