<div>
    <input {!! $attributes->merge(["type" => "text", "class" => "text-sm rounded-lg border-none bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 mt-1 w-full"]) !!}>
</div>


@once
    @push("scripts")
        <script src="{{ asset('vendor/mask/jquery.mask.min.js') }}"></script>
    @endpush
@endonce

@push("scripts")
    <!--igorescobar jQuery-Mask-Plugin -->
    <script>
        $("#{{$attributes->get("id")}}").mask("{!! $attributes->get("data-mask") !!}", {!! $attributes->get("data-options") !!});
    </script>
@endpush
