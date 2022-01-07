<div class="flex">
{{--    @json($options)--}}
    @foreach($options as $key => $item)
        @php($id = Str::random(8))
        <div class="mr-3">
            <input {{$attributes->merge(['class' => "focus:border-indigo-400 rounded-full text-red-500"])}}
                   type="radio"
                   wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}"
                   id="{{$id}}"
                   value="{{$item[$value]}}">
            <label for="{{$id}}">{{$item[$text]}}</label>
        </div>
    @endforeach
</div>
