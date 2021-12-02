<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

trait SettingState
{

    public $previous;

    public array $setting = [
        "setting_id" => "",
        "setting_name" => "",
        "setting_order" => "",
        "setting_input" => "",
        "setting_value" => "",
        "setting_removable" => "1",
    ];

    public $updateMode = false;

    public array $breadcrumbs = [
        ["link" => "#", "title" => "Admin"],
        ["link" => "#", "title" => "Setting Management"],
    ];


    public function save()
    {
        $this->updateMode ? $this->update() : $this->store();
    }

    public function store()
    {
        $rules = [
            "setting.setting_name" => [
                "required"
            ],
            "setting.setting_input" => [
                "required"
            ],
            "setting.setting_removable" => [
                "required"
            ],
        ];
        $this->validate($rules);

        $this->updateMode = false;

        $db = new Setting;
        $this->handleFormRequest($db);
        $this->reset("setting");

        session()->flash('message', 'Setting berhasil ditambahkan.');
        $this->back();
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $setting = Setting::where('setting_id', $id)->first();
        $this->setting = $setting->toArray();
    }

    public function update()
    {
        $rules = [
            "setting.setting_name" => [
                "required"
            ],
            "setting.setting_input" => [
                "required"
            ],
            "setting.setting_removable" => [
                "required"
            ],
        ];
        $this->validate($rules);


        $save = false;

        if ($this->setting["setting_id"]) {
            $db = Setting::find($this->setting["setting_id"]);
            $save = $this->handleFormRequest($db);
            $this->reset("setting");
        } else {
            abort('403', 'Setting Not Found');
        }

        if ($save) {
            session()->flash('message', 'Setting berhasil diupdate.');
            $this->back();
        }
    }

    public function destroy($id)
    {
        $delete = Setting::destroy($id);
        if ($delete) {
            $this->emit("refreshDt");
            $this->emit("showToast", ["message" => "Settings Deleted Successfully", "type" => "success"]);
        } else {
            $this->emit("showToast", ["message" => "Delete Failed", "type" => "success"]);
        }
        $this->reset();
    }

    private function handleFormRequest(Setting $db): bool
    {
        try {
            $db->setting_name = $this->setting['setting_name'];
            if (!$this->updateMode){
                $db->setting_key = Str::slug($this->setting['setting_name'],"_");
                $db->setting_order = Setting::max("setting_order")+1;
            }
            $db->setting_input = $this->setting['setting_input'];

            $db->setting_removable = $this->setting['setting_removable'];

            if ($this->updateMode){
//with image intervention
                if ($this->image){
                    $basename = Str::random();
                    $image = $this->image;
                    $original = $basename . '.' . $image->getClientOriginalExtension();
                    $thumbnail = 'thumb_'.$basename .'.'. $image->getClientOriginalExtension();
                    Image::make($image)
                        ->resize(null, 100, function ($constraint){
                            $constraint->aspectRatio();
                        })
                        ->save(public_path('/storage/settings/' . $thumbnail));
                    $db->setting_value = $original;
                    $image->storeAs("settings", $original,"public");
                }else{
                    $db->setting_value = $this->setting['setting_value'];
                }
            }

            return $db->save();
        } catch (\Exception $e) {
            return $e->getTraceAsString();
        }
    }

    public function back()
    {
        redirect($this->previous);
    }


}
