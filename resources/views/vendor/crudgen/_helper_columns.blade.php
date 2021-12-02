@foreach($fields as $column)
Column::make('{{$column['label']}}', '{{$column['name']}}')
    ->searchable()
    ->sortable(),
@endforeach
