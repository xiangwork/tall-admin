<main class="w-full flex-grow px-3">
    <section class="content overflow-x-scroll rounded-lg overflow-y-scroll h-full mx-auto py-5 px-5 min-h-screen">
        <div class="pb-3">
            <x-ui.breadcrumb :breadcrumbs="$breadcrumbs"></x-ui.breadcrumb>
        </div>
        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg">
            <div class="mb-5 flex flex-grow flex-col md:flex-row items-center justify-center md:justify-between">
                <h4 class="heading mb-3 md:mb-0">
                    {{$updateMode ? "Edit User" : "Tambah User"}}
                </h4>

                <x-ui.button class="bg-red-500 text-white hover:bg-red-400"
                                wire:click="back"
                                variant="circle">
                    <span class="flex justify-center items-center fi-rr-cross"></span>
                </x-ui.button>
            </div>

            <div>
                <form action="#" wire:submit.prevent="save" class="p-3">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
                        <x-input.form-group class="form-group" label="Nama" key="name" model="user.name">
                            <x-input.text id="nama" wire:model.defer="user.name"></x-input.text>
                        </x-input.form-group>

                        <x-input.form-group class="form-group" label="Username" key="username" model="user.username">
                            <x-input.text id="username" wire:model.defer="user.username"></x-input.text>
                        </x-input.form-group>

                        <x-input.form-group class="form-group" label="Email" key="email" model="user.email">
                            <x-input.text id="email" wire:model.defer="user.email" type="email"></x-input.text>
                        </x-input.form-group>

                        <x-input.form-group class="form-group" label="Role" key="role" model="user.role">
                            <x-input.select wire:key="selectRole" method="role" wire:model="user.role"
                                            id="selectRole"
                                            :select2="true"></x-input.select>
                        </x-input.form-group>

                        <x-input.form-group class="form-group" label="birthplace" key="birthplace"
                                            model="user.birthplace">
                            <x-input.text id="birthplace" wire:model.defer="user.birthplace"></x-input.text>
                        </x-input.form-group>

                        <x-input.form-group class="form-group" label="birthdate" key="birthdate"
                                            model="user.birthdate">
                            <x-input.datepicker id="birthdate" wire:model.defer="user.birthdate"></x-input.datepicker>
                        </x-input.form-group>
                    </div>

                    <x-input.form-group class="form-group" label="" key="role" model="user.village_id">
                        <livewire:input.laravolt :value="$user['village_id']" :level="4"
                                                 parent-name="user.user-form"
                                                 parent-value-listener="setVillageId"/>
                    </x-input.form-group>

                    <x-input.form-group class="form-group" label="address" key="address" model="user.address">
                        <x-input.textarea id="address"
                                          wire:key="userAddress"
                                          wire:model.defer="user.address"></x-input.textarea>
                    </x-input.form-group>

                    <x-input.form-group class="form-group" label="About" key="about" model="user.about">
                        <x-input.textarea id="about"
                                          wire:key="userAbout"
                                          wire:model.defer="user.about"></x-input.textarea>
                    </x-input.form-group>


                    <x-input.form-group class="form-group" label="Active" key="role" model="user.active">
                        <x-input.radio method="bool" wire:model.defer="user.active"></x-input.radio>
                    </x-input.form-group>

                    <x-input.form-group class="form-group" label="Avatar" key="avatar" model="image">
                        <x-input.filepond data-event-name="setAvatar" wire:key="setAvatar"
                                          wire:model="image"></x-input.filepond>
                    </x-input.form-group>

                    <div class="flex place-content-end py-4">
                        <x-ui.button
                            wire:click="back"
                            class="bg-red-500 hover:bg-red-400 text-white hover:bg-blue-400">
                            Kembali
                        </x-ui.button>
                        <x-ui.button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white hover:bg-blue-400"
                                        wire:click="save">
                            {{$updateMode ? "Simpan Perubahan" : "Simpan"}}
                        </x-ui.button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

@push("scripts")

    @include("includes._toast-scripts")

    <script data-turbolinks-eval="false" data-turbo-eval="false">
        document.addEventListener("DOMContentLoaded", function () {
            Livewire.emit("setAboutValue");
        });
    </script>
@endpush
