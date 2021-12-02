<?php


namespace App\Http\Livewire\User;


use Livewire\Component;

class UserPage extends Component
{
    use UserState;

    public function mount()
    {
        session()->put('active', 'user');
        session()->put('expanded', 'admin');
    }

    public function render()
    {
        return view('livewire.user.user-page')
            ->layout('layouts.admin');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

}
