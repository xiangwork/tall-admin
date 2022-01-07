<?php


namespace App\Http\Livewire\Slider;


use Livewire\Component;

class SliderPage extends Component
{
    use SliderState;

    protected $listeners = ['create', 'edit'];

    public function mount()
    {
        session()->put('active', 'slider');
        session()->put('expanded', 'admin');
    }

    public function render()
    {
        return view('livewire.slider.slider-page')
            ->layout('layouts.admin', ['htmlTitle'=>'Slider']);
    }

}
