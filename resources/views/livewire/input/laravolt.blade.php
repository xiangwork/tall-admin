<div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
    <x-input.form-group label="Provinsi" key="selectedProvince" model="selectedProvince">
        <x-input.select wire:key="select_province"
                        wire:model="selectedProvince"
                        method="custom"
                        id="selectProvince"
                        :select2="true"
                        :options="$provinces" text="name" value="id"></x-input.select>
    </x-input.form-group>

    @if(count($cities) && $level >= 2)
        <x-input.form-group label="Kota" key="selectedCity" model="selectedCity">
            <x-input.select method="custom"
                            wire:key="select_city"
                            wire:model="selectedCity"
                            id="selectCity"
                            :select2="true"
                            :options="$cities" text="name" value="id"></x-input.select>
        </x-input.form-group>
    @endif

    @if(count($districts) && $level >= 3)
        <x-input.form-group label="Kecamatan" key="selectedDistrict" model="selectedDistrict">
            <x-input.select id="selectDistrict"
                            method="custom"
                            wire:key="select_district"
                            wire:model="selectedDistrict"
                            :select2="true"
                            :options="$districts" text="name" value="id"></x-input.select>
        </x-input.form-group>


    @endif

    @if(count($villages) && $level >= 4)
        <x-input.form-group label="Kelurahan / Desa" key="selectedVillage" model="selectedVillage">
            <x-input.select id="selectVillage" wire:key="select_village" method="custom" wire:model="selectedVillage" :select2="true"
                            :options="$villages" text="name" value="id"></x-input.select>
        </x-input.form-group>

    @endif
</div>
