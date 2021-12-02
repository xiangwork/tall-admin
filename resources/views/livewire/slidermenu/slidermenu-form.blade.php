<main class="w-full flex-grow px-3">
    <section class="content overflow-x-scroll rounded-lg overflow-y-scroll h-full mx-auto py-5 px-5 min-h-screen">
        <div class="pb-3">
            <x-ui.breadcrumb :breadcrumbs="$breadcrumbs"></x-ui.breadcrumb>
        </div>
        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg">
            <div class="mb-5 flex items-center justify-between">
                <h4 class="heading mb-3 md:mb-0">
                    {{$updateMode ? "Edit SliderMenu" : "Tambah SliderMenu"}}
                </h4>

                <x-ui.button class="bg-red-500 text-white hover:bg-red-400"
                                wire:click="back"
                                variant="circle">
                    <span class="flex justify-center items-center fi-rr-cross"></span>
                </x-ui.button>
            </div>

            <div>
                <form action="#" wire:submit.prevent="save" class="p-3">

                    <div class="grid grid-cols-1 md:grid-cols-1 gap-x-4">
                        <x-input.form-group label="Title" key="slider_title" model="slidermenu.slider_title">
                            <x-input.text id="Title" wire:model.defer="slidermenu.slider_title"></x-input.text>
                        </x-input.form-group>

                        <x-input.form-group label="Image" key="slider_image" model="slidermenu.slider_image">
                            <x-input.filepond data-event-name="resetFilePond" wire:model="myFile"></x-input.filepond>
                        </x-input.form-group>

                        <x-input.form-group label="Active" key="slider_active" model="slidermenu.slider_active">
                            <x-input.toggle-switch method="bool" wire:model.defer="slidermenu.slider_active"
                                           :select2="false"></x-input.toggle-switch>
                        </x-input.form-group>

                        <x-input.form-group label="Desc" key="slider_desc" model="slidermenu.slider_desc">
                            <x-input.summernote data-event-name="set_summernote_value" id="Desc"
                                                wire:model.defer="slidermenu.slider_desc">
                            </x-input.summernote>
                        </x-input.form-group>

                    </div>

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

    <script>
        document.addEventListener("DOMContentLoaded", function (){
            Livewire.emit("set_summernote_value");
        });
    </script>

@endpush
