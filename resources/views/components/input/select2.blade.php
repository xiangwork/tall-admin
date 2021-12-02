<div>
    <div wire:ignore.self class="w-full">
        @php
            if (isset($attributes)){
                $id = $attributes->get('id') ?? \Illuminate\Support\Str::random();
            }
        @endphp
        <select {!! $attributes->merge(['class' => 'mt-1 block w-full rounded-md dark:bg-gray-600 bg-gray-200 border-transparent focus:border-red-400 focus:bg-gray-200 dark:focus:bg-gray-800 focus:ring-0 text-sm text-gray-700 dark:text-gray-300']) !!}>
            <option></option>
            @foreach($options as $key => $item)
                <option
                    value="{{ $item[$value] }}" {{ $attributes->wire('model')->value() == $item[$value] ? 'selected' : ''}}>{{$item[$text]}}</option>
            @endforeach
        </select>
    </div>

    <script data-turbolinks-eval="false" data-turbo-eval="false">
        @php
            if (isset($id)){
                $name = "init$id";
                $functionName = "$name()";
            }
        @endphp

            window.{!! $name !!} = function () {
            $('#{{$id}}').select2({
                width: '100%'
            });
            $('#{{$id}}').on('change', function (e) {
                let data = $(this).select2("val");
                var el = '{!! $attributes->wire('model') !!}';

            @this.set(el, data);
            });
        }

        document.addEventListener('livewire:load', function () {
            {!! $functionName !!};
        })

        window.addEventListener('initSelect2', event => {

            {!! $functionName !!};
            $('#{{$id}}').select2({
                width: '100%'
            });
        });

    </script>

</div>

