<?php

namespace App\Http\Livewire\SliderMenu;

use App\Models\SliderMenu;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait SliderMenuState
{
    public $previous;

    public array $slidermenu = [
        "slider_id" => "",
        "slider_title" => "",
        "slider_desc" => "",
        "slider_image" => "",
        "slider_active" => 1,
    ];

    public $updateMode = false;

    public array $breadcrumbs = [
        ["link" => "#", "title" => "Admin"],
        ["link" => "#", "title" => "SliderMenu"],
    ];


    public function save()
    {
        $this->updateMode ? $this->update() : $this->store();
    }

    public function store()
    {
        $rules = [
            "slidermenu.slider_title" => [
                "required"
            ],
            "slidermenu.slider_desc" => [
                "required"
            ],
            "myFile" => [
                "required", "image"
            ],
            "slidermenu.slider_active" => [
                "required"
            ],
        ];
        $this->validate($rules);

        $this->updateMode = false;

        $save = $this->handleFormRequest(new SliderMenu);

        if ($save) {
            $this->reset("slidermenu");
            session()->flash('message', 'SliderMenu berhasil ditambahkan.');
            $this->back();

        } else {
            abort('403', 'SliderMenu gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $slidermenu = SliderMenu::where('slider_id', $id)->first();
        $this->slidermenu = $slidermenu->toArray();
        $this->emit("set_summernote_value");
    }

    public function update()
    {
        $rules = [
            "slidermenu.slider_title" => [
                "required"
            ],
            "slidermenu.slider_desc" => [
                "required"
            ],
            "slidermenu.slider_active" => [
                "required"
            ],
        ];
        $this->validate($rules);


        $save = false;

        if ($this->slidermenu["slider_id"]) {
            $db = SliderMenu::find($this->slidermenu["slider_id"]);
            $save = $this->handleFormRequest($db);
        } else {
            abort('403', 'SliderMenu Not Found');
        }

        if ($save) {
            $this->reset("slidermenu");
            session()->flash('message', 'SliderMenu berhasil diupdate.');
            $this->back();
        }
    }

    public function destroy($id)
    {
        $delete = SliderMenu::destroy($id);
        if ($delete) {
            $this->emit("refreshDt");
            $this->emit("showToast", ["message" => "SliderMenus Deleted Successfully", "type" => "success"]);
        } else {
            $this->emit("showToast", ["message" => "Delete Failed", "type" => "success"]);
        }
        $this->reset();
    }

    private function handleFormRequest(SliderMenu $db): bool
    {
        $db->slider_title = $this->slidermenu['slider_title'];
        $db->slider_desc = $this->slidermenu['slider_desc'];
        if ($this->myFile) {
            $basename = Str::random();
            $image = $this->myFile;
            $original = $basename . '.' . $image->getClientOriginalExtension();
            $thumbnail = 'thumb_'. $basename . '.'.$image->getClientOriginalExtension();

            $image->storeAs("sliders", $original,"public");

            Image::make($image)
                ->resize(null, 100, function ($constraint){
                    $constraint->aspectRatio();
                })
                ->save(public_path('/storage/sliders/' . $thumbnail));

            $this->dispatchBrowserEvent('resetFilePond');

            $db->slider_image = $original;
        }
        $db->slider_active = $this->slidermenu['slider_active'];

        return $db->save();
    }

    public function back()
    {
        redirect($this->previous);
    }


}
