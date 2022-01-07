<?php

namespace App\View\Components\Traits;

trait RadioOptionsTrait {

    private function role()
    {
        $this->text = "text";
        $this->value = "value";
        $this->placeholder = "Please Select A Role ...";
        return [
            [
                "value" => "admin",
                "text" => "Admin",
            ],
            [
                "value" => "super-admin",
                "text" => "Super Admin",
            ],
        ];
    }

    private function bool()
    {
        $this->value = "value";
        $this->text = "text";
        $this->placeholder = "";
        return [
            [
                "value" => "1",
                "text" => "Ya",
            ],
            [
                "value" => "0",
                "text" => "Tidak",
            ]
        ];
    }

    private function select_slider_active()
    {
        $this->value = "value";
        $this->text = "text";
        $this->placeholder = "";
        return [
            [
                "value" => "1",
                "text" => "Ya",
            ],
            [
                "value" => "0",
                "text" => "Tidak",
            ]
        ];
    }

    private function select_setting_removable()
    {
        $this->value = "value";
        $this->text = "text";
        $this->placeholder = "";
        return [
            [
                "value" => "1",
                "text" => "Ya",
            ],
            [
                "value" => "0",
                "text" => "Tidak",
            ]
        ];
    }

}
