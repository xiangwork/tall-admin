<div class="flex">
    <a href="{{route('slidermenu.form', $row->slider_id)}}">
        <x-ui.button class="bg-blue-500 text-white hover:bg-blue-400"
                        variant="circle"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                        wire:click="$emit('edit',{{$row->slider_id}})">
            <span class="flex items-center fi-rr-pencil"></span>
        </x-ui.button>
    </a>
    <x-ui.button variant="circle" class="bg-red-500 text-white hover:bg-red-400"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"
                    wire:click="$emit('confirmDestroy', {{$row->slider_id}})">
        <span class="flex items-center fi-rr-trash"></span>
    </x-ui.button>
</div>
