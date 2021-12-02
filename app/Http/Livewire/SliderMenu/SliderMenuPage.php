<?php


namespace App\Http\Livewire\SliderMenu;


use App\Models\SliderMenu;
use Livewire\Component;

class SliderMenuPage extends Component
{
    use SliderMenuState;

    public $listeners = ["watchSliderActive"];

    public function watchSliderActive($value, $row)
    {
        $db = SliderMenu::find($row['slider_id']);
        $db->slider_active = $value;
        $db->save();
    }

    public function mount()
    {
        session()->put('active', 'slidermenu');
        session()->put('expanded', 'admin');
    }

    public function render()
    {
        return view('livewire.slidermenu.slidermenu-page')
            ->layout('layouts.admin');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

}
