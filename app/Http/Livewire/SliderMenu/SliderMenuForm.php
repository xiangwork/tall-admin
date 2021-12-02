<?php

namespace App\Http\Livewire\SliderMenu;

use Livewire\Component;
use Livewire\WithFileUploads;

class SliderMenuForm extends Component
{
//    public $image;
    public $myFile;

    use WithFileUploads;

    public $type;

    use SliderMenuState;

    public function mount($slider_id = null)
    {
        $this->previous = url()->previous();

        if ($slider_id) {
            $this->edit($slider_id);
        }

        $this->breadcrumbs = [
            ["link" => "#", "title" => "Admin"],
            ["link" => route('slidermenu'), "title" => "SliderMenu"],
            ["link" => url('/'), "title" => "SliderMenu Form"],
        ];

        session()->put('active', 'slidermenu');
        session()->put('expanded', 'admin');
    }

    public function render()
    {
        if (count($this->getErrorBag()->all()) > 0) {
            $this->emit('showToast', ["message" => "Mohon lengkapi form", "type" => "error", "reload" => false]);
        }
        return view('livewire.slidermenu.slidermenu-form')
            ->layout('layouts.admin');
    }
}
