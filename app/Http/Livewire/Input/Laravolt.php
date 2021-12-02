<?php

namespace App\Http\Livewire\Input;

use Laravolt\Indonesia\Facade as Indonesia;
use Livewire\Component;

class Laravolt extends Component
{

    public $provinces;
    public $selectedProvince;

    public $cities = [];
    public $selectedCity;

    public $districts = [];
    public $selectedDistrict;

    public $villages = [];
    public $selectedVillage;

    public $parentValueListener;
    public $parentName;

    public $level = 4;
    public $value;

    /*
    level 1 province,
    level 2 province and city
    level 3 province, city and district,
    level 4 province, city, district and village,
    */

    public function mount($level, $value, $parentName, $parentValueListener)
    {
        $this->value = $value;
        $this->level = $level;
        $this->parentValueListener = $parentValueListener;
        $this->parentName = $parentName;

        $provinces = Indonesia::allProvinces();
        $x = collect($provinces);
        $x->prepend(["id" => "0", "name" => "Select a province"]);
        $this->provinces = $x;

        switch ($level) {
            case 1:
                if ($value){
                    $this->setProvince($value);
                }
                $this->selectedProvince = $value;
                break;
            case 2:
               if ($value){
                   $this->setCity($value);
               }
                $this->selectedCity = $value;
                break;
            case 3:
                if ($value){
                    $this->setDistrict($value);
                }
                $this->selectedDistrict = $value;
                break;
            case 4:
                if ($value){
                    $this->setVillage($value);
                }
                $this->selectedVillage = $value;
                break;
        }

    }

    public function setProvince($provinceId)
    {
        $data = Indonesia::findProvince($provinceId, ['cities']);
        $this->selectedProvince = $provinceId;
        $this->cities = $data->cities;
        if ($this->level==1){
            $this->emitTo($this->parentName, $this->parentValueListener, $provinceId);
        }
    }

    public function setCity($cityId)
    {
        $data = Indonesia::findCity($cityId,['province','districts']);
        $this->setProvince($data->province_id);
        $this->selectedCity = $cityId;
        $this->districts = $data->districts;
        if ($this->level==2){
            $this->emitTo($this->parentName, $this->parentValueListener, $cityId);
        }
    }

    public function setDistrict($districtId)
    {
        $data = Indonesia::findDistrict($districtId,['city.province', 'villages']);
        $this->setProvince($data->city->province_id);
        $this->setCity($data->city_id);
        $this->selectedDistrict = $districtId;
        $this->villages = $data->villages;
        if ($this->level==3){
            $this->emitTo($this->parentName, $this->parentValueListener, $districtId);
        }
    }

    public function setVillage($villageId)
    {
        $data = Indonesia::findVillage($villageId,['district.city.province']);
        $this->setProvince($data->district->city->province_id);
        $this->setCity($data->district->city_id);
        $this->setDistrict($data->district_id);
        $this->selectedVillage = $villageId;
        if ($this->level==4){
            $this->emitTo($this->parentName, $this->parentValueListener, $villageId);
        }
    }

    public function updatedSelectedProvince($value)
    {
        $data = Indonesia::findProvince($value, ['cities']);
        $this->selectedProvince = $value;
        $this->selectedCity = "0";
        $this->selectedDistrict = "0";
        $this->selectedVillage = "0";
        $x = collect($data->cities ?? []);
        $x->prepend(["id" => "0", "name" => "Select a city"]);
        $this->cities = $x;
        $this->districts = [];
        $this->villages = [];

        if ($this->level == 1) {
            $this->emitTo($this->parentName, $this->parentValueListener, $value);
        }
        $this->dispatchBrowserEvent("initSelect2");
    }

    public function updatedSelectedCity($value)
    {
        $data = Indonesia::findCity($value, ['districts']);
        $this->selectedCity = $value;
        $this->selectedDistrict = "0";
        $this->selectedVillage = "0";
        $x = collect($data->districts ?? []);
        $x->prepend(["id" => "0", "name" => "Select a district"]);
        $this->districts = $x;
        $this->villages = [];

        if ($this->level == 2) {
            $this->emitTo($this->parentName, $this->parentValueListener, $value);
        }
        $this->dispatchBrowserEvent("initSelect2");
    }

    public function updatedSelectedDistrict($value)
    {
        $data = Indonesia::findDistrict($value, ['villages']);
        $this->selectedDistrict = $value;
        $this->selectedVillage = "0";
        $x = collect($data->villages ?? []);
        $x->prepend(["id" => "0", "name" => "Select a village"]);
        $this->villages = $x;

        if ($this->level == 3) {
            $this->emitTo($this->parentName, $this->parentValueListener, $value);
        }
        $this->dispatchBrowserEvent("initSelect2");
    }

    public function updatedSelectedVillage($value)
    {
        $this->selectedVillage = $value;
        if ($this->level == 4) {
//            dd($this->parentName, $this->parentValueListener);
            $this->emitTo($this->parentName, $this->parentValueListener, $value);
        }
        $this->dispatchBrowserEvent("initSelect2");
    }

    public function render()
    {
        return view('livewire.input.laravolt');
    }
}
