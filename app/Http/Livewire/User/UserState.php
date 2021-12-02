<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Str;

trait UserState
{
    public $previous;

    public array $user = [
        "user_id" => "",
        "village_id" => "",
        "name" => "",
        "username" => "",
        "birthplace" => "",
        "birthdate" => "",
        "address" => "",
        "email" => "",
        "role" => "",
        "avatar" => "",
        "about" => "",
        "active" => 1,
        "lat" => -2.1746617,
        "lng" => 115.39786,
    ];

    public $location = [
        "search" => "",
        "lat" => -2.1746617,
        "lng" => 115.39786,
        "radius" => 200
    ];

    public $updateMode = false;

    public array $breadcrumbs = [
        ["link" => "#", "title" => "Admin"],
        ["link" => "#", "title" => "User Management"],
    ];


    public function save()
    {
        $this->updateMode ? $this->update() : $this->store();
    }

    public function store()
    {
        $rules = [
            'user.name' => 'required',
            'user.username' => 'required',
            'user.role' => 'required',
            'user.email' => 'required|email',
            'user.village_id' => 'required',
        ];

        $this->validate($rules);

        $this->updateMode = false;

        $save = $this->handleFormRequest(new User);
        $this->reset("user");

        if ($save) {
            session()->flash('message', 'User berhasil ditambahkan.');
            $this->back();
        }else{
            abort('403', 'User gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::where('user_id', $id)->first();
        $this->user = $user->toArray();
    }

    public function update()
    {
        $rules = [
            'user.name' => 'required',
            'user.username' => 'required',
            'user.role' => 'required',
            'user.email' => 'required|email',
        ];

        $this->validate($rules);

        $save = false;

        if ($this->user["user_id"]) {
            $db = User::find($this->user["user_id"]);
            $save = $this->handleFormRequest($db);
        } else {
            abort('403', 'User Not Found');
        }

        if ($save) {
            $this->reset("user");
            session()->flash('message', 'User berhasil diupdate.');
            $this->back();
        }
    }

    public function destroy($id)
    {
        $delete = User::destroy($id);
        if ($delete) {
            $this->emit("refreshDt");
            $this->emit("showToast", ["message" => "Users Deleted Successfully", "type" => "success"]);
        } else {
            $this->emit("showToast", ["message" => "Delete Failed", "type" => "success"]);
        }
        $this->reset();
    }

    private function handleFormRequest(User $db): bool
    {
        try {
            $db->username = $this->user['username'];
            $db->email = $this->user['email'];
            $db->name = $this->user['name'];
            $db->role = $this->user['role'];
            $db->active = $this->user['active'];
            $db->address = $this->user['address'];
            $db->birthdate = $this->user['birthdate'];
            $db->birthplace = $this->user['birthplace'];
            $db->about = $this->user['about'];
            $db->village_id = $this->user['village_id'];
            $db->lat = $this->location['lat'];
            $db->lng = $this->location['lng'];
            if (!$this->updateMode) {
                $db->password = bcrypt("password");
                $db->api_token = Str::random(100);
            }
            return $db->save();
        }catch (\Exception $e){
            return $e->getTraceAsString();
        }
    }

    public function setVillageId($value)
    {
        $this->user['village_id'] = $value;
    }

    public function back()
    {
        redirect($this->previous);
    }


}
