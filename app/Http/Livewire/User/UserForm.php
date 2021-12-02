<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;

class UserForm extends Component
{
    public $image;

    public $type;

    use WithFileUploads;

    use UserState;


    public function mount($user_id = null)
    {
        $this->previous = url()->previous();

        if ($user_id){
            $this->edit($user_id);
        }

        $this->breadcrumbs = [
            ["link" => "#", "title" => "Admin"],
            ["link" => route('user'), "title" => "User Management"],
            ["link" => url('/'), "title" => "User Form"],
        ];

        session()->put('active', 'user');
        session()->put('expanded', 'admin');
    }

    public function render()
    {
        if(count($this->getErrorBag()->all()) > 0){
            $this->emit('showToast',["message" => "Mohon lengkapi form", "type" => "error", "reload"=>false]);
        }
        return view('livewire.user.user-form')
            ->layout('layouts.admin');
    }

    protected $listeners = [
        'setVillageId'
    ];
}
