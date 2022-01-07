<!-- modal tailwind {!! $attributes->get('id') !!} -->

<div role="dialog"
     aria-labelledby="{!! $attributes->get('id') !!}_label"
     aria-modal="true"
     tabindex="0"
     x-cloak
     x-data="{open:@entangle($attributes->wire('model'))}"
     x-show="open"
     x-init="$wire.on('{!! $attributes->get('modal-show-event') !!}', ()=>{
                  open = true;
              });"
     @click="open = false"
{{--     @click.away="open = false"--}}
     class="fixed top-0 left-0
            w-full h-screen flex justify-center items-center">
    <div aria-hidden="true"
         class="absolute top-0 left-0 w-full h-screen bg-black transition duration-300"
         :class="{ 'opacity-60': open, 'opacity-0': !open }"
         x-show="open"
         x-transition:leave="delay-150"></div>
    <div data-modal-document
         @click.stop=""
         x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="transform scale-50 opacity-0"
         x-transition:enter-end="transform scale-100 opacity-100"
         x-transition:leave="transition ease-out duration-300"
         x-transition:leave-start="transform scale-100 opacity-100"
         x-transition:leave-end="transform scale-50 opacity-0"
         class="bg-gray-100 dark:bg-gray-800
                flex flex-col rounded-lg shadow-lg overflow-x-hidden bg-white w-4/5 lg:w-3/5 h-4/5 z-10">
        <div class="px-6 py-3 border-b flex justify-between items-center">
            <h2 class="text-gray-700 dark:text-gray-300 font-semibold tracking-wider uppercase" id="{!! $attributes->get('id') !!}_label">{{$title}}</h2>
            <div>
                <x-ui.button x-on:click="open=false" type="button"
                    variant="circle" class="bg-red-500">
                    <span class="flex items-center justify-center fi-rr-cross"></span>
                </x-ui.button>
            </div>
        </div>
        <div class="p-6">
            <input type="hidden" x-model="open">
            {{$slot}}
        </div>
    </div>
</div>
