<?php

namespace App\View\Components\Traits;

trait SelectOptionsTrait{


    public function provinces()
    {
        return Indonesia::allProvinces();
    }

    public function role()
    {
        $this->value = "value";
        $this->text = "text";
        $this->initialValue = [
            "value" => "",
            "text" => "Select A Role"
        ];
        $this->placeholder = "Please Select A Role ...";
        return [
            [
                "value" => "admin",
                "text" => "Admin"
            ],
            [
                "value" => "super-admin",
                "text" => "Super Admin"
            ]
        ];
    }

    public function select_setting_input()
    {
        $this->value = "value";
        $this->text = "text";
        $this->placeholder = "Please Select A Type ...";
        return [
            [
                "value" => "",
                "text" => "Select A Type"
            ],
            [
                "value" => "text",
                "text" => "Text"
            ],
            [
                "value" => "radio",
                "text" => "Radio"
            ],
            [
                "value" => "textarea",
                "text" => "Textarea"
            ],
            [
                "value" => "switch",
                "text" => "Switch"
            ],
            [
                "value" => "file",
                "text" => "File"
            ],
            [
                "value" => "color picker",
                "text" => "Color Picker"
            ],
//            [
//                "value" => "wysiwyg",
//                "text" => "wysiwyg"
//            ],
//            [
//                "value" => "map",
//                "text" => "map"
//            ],
        ];
    }
}
