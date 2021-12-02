<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use Livewire\WithFileUploads;

class SettingForm extends Component
{
    public $image;
    //public $myFile;

    use WithFileUploads;

    public $type;

    use SettingState;

    public function mount($setting_id = null)
    {
        $this->previous = url()->previous();

        if ($setting_id){
            $this->edit($setting_id);
        }

        $this->breadcrumbs = [
            ["link" => "#", "title" => "Admin"],
            ["link" => route('setting'), "title" => "Setting Management"],
            ["link" => url('/'), "title" => "Setting Form"],
        ];

        session()->put('active', 'setting');
        session()->put('expanded', 'admin');
    }

    public function render()
    {
        if(count($this->getErrorBag()->all()) > 0){
            $this->emit('showToast',["message" => "Mohon lengkapi form", "type" => "error", "reload"=>false]);
        }
        return view('livewire.setting.setting-form')
            ->layout('layouts.admin');
    }
}
