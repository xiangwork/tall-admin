<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserForm extends Component
{
    use UserState;

    public function mount($user_id = null)
    {
        $this->previous = url()->previous();

        if ($user_id){
            $this->edit($user_id);
        }
    }
}
