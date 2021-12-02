<?php


namespace App\Http\Livewire\Setting;


use Livewire\Component;

class SettingPage extends Component
{
    use SettingState;

    public function mount()
    {
        session()->put('active', 'setting');
        session()->put('expanded', 'admin');
    }

    public function render()
    {
        return view('livewire.setting.setting-page')
            ->layout('layouts.admin');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

}
