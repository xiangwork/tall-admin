@props(['title', 'show-modal-event', 'close-modal-event', 'id'])
<div>
    <!-- [1] -->
    <div id="{!! $attributes->get('id') !!}" aria-hidden="true">

        <!-- [2] -->
        <div tabindex="-1" data-micromodal-close>

            <!-- [3] -->
            <div role="dialog" aria-modal="true" aria-labelledby="{!! $attributes->get('id') !!}-title">


                <header>
                    <h2 id="{!! $attributes->get('id') !!}-title">
                        {{$title}}
                    </h2>

                    <!-- [4] -->
                    <button aria-label="Close modal" data-micromodal-close></button>
                </header>

                <div id="{!! $attributes->get('id') !!}-content">
                    {{$slot}}
                </div>

            </div>
        </div>
    </div>
</div>

@once
    @push('scripts')
        <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    @endpush
@endonce

@push('scripts')
    @php($modalVar = \Illuminate\Support\Str::random(8));
    <script>
       MicroModal.init({
            onShow: modal => console.info(`${modal.id} is shown`), // [1]
            onClose: modal => console.info(`${modal.id} is hidden`), // [2]
            openTrigger: 'data-custom-open', // [3]
            closeTrigger: 'data-custom-close', // [4]
            openClass: 'block', // [5]
            disableScroll: true, // [6]
            disableFocus: false, // [7]
            awaitOpenAnimation: false, // [8]
            awaitCloseAnimation: false, // [9]
            debugMode: true // [10]
        });

        Livewire.on('{!! $attributes->get('show-modal-event') !!}', () =>{
            MicroModal.show('{!! $attributes->get('id') !!}');
        });

       Livewire.on('{!! $attributes->get('close-modal-event') !!}', () =>{
           MicroModal.close('{!! $attributes->get('id') !!}');
       });
    </script>
@endpush
