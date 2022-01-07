@foreach($fields as $field)
    <xxx-input.form-group label="{{$field['label']}}" key="{{$field['name']}}" model="{{$model}}.{{$field['name']}}">
        @switch($field['htmlType'])
            @case("file")
            <xxx-input.filepond remove-file-event="removeFile" wire:model="image"></xxx-input.filepond>
            @break

            @case("date")
            <xxx-input.text type="date" id="{{$field['label']}}" wire:model.defer="{{$model}}.{{$field['name']}}"></xxx-input.text>
            @break

            @case("time")
            <xxx-input.text type="datetime-local" id="{{$field['label']}}" wire:model.defer="{{$model}}.{{$field['name']}}"></xxx-input.text>
            @break

            @case("summernote")
            <xxx-input.summernote data-event-name="set_summernote_value" id="{{$field['label']}}" wire:model.defer="{{$model}}.{{$field['name']}}"></xxx-input.summernote>
            @break

            @case("select")
            <xxx-input.select method="select_{{$field['name']}}" wire:model.defer="{{$model}}.{{$field['name']}}" :select2="false"></xxx-input.select>
            @break

            @case("radio")
                <xxx-input.radio method="select_{{$field['name']}}" wire:model.defer="{{$model}}.{{$field['name']}}" :select2="false"></xxx-input.radio>
            @break

            @default
            <xxx-input.text id="{{$field['label']}}" wire:model.defer="{{$model}}.{{$field['name']}}"></xxx-input.text>
            @break
        @endswitch
    </xxx-input.form-group>
@endforeach
