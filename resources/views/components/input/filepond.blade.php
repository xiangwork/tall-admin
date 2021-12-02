<div x-data="" wire:ignore
     x-init="() => {
        const fp = FilePond.create($refs.input);
        fp.setOptions({
            server: {
                process:(fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes->whereStartsWith('wire:model')->first() }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes->whereStartsWith('wire:model')->first() }}', filename, load)
                },
            }
        });
        this.addEventListener('{{$attributes['data-event-name']}}', e => {
                fp.removeFiles();
            });
    }">
    <input type="file" class="fp" x-ref="input">
</div>
@push("scripts")
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endpush

@push("styles")
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
@endpush
