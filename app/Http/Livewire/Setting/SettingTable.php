<?php

namespace App\Http\Livewire\Setting;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Setting;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class SettingTable extends DataTableComponent
{

    public string $defaultSortColumn = 'setting_order';
    public string $defaultSortDirection = 'asc';
    public bool $reorderEnabled = true;
    public bool $perPageAll = true;

    public array $bulkActions = [
        'destroySelected' => 'Hapus Data Terpilih',
    ];

    protected int $index = 0;

    public string $primaryKey = "setting_id";

    public function reorder($items): void
    {
        foreach ($items as $item) {
            optional(Setting::find((int)$item['value']))->update(['setting_order' => (int)$item['order']]);
        }
    }

    public function destroySelected()
    {
        Setting::whereIn($this->primaryKey, $this->selectedRowsQuery()->pluck($this->primaryKey))
            ->where("setting_removable", true)
            ->delete();
        $this->emit("showToast", ["message" => "Settings Deleted Successfully", "type" => "success"]);
    }

    public function columns(): array
    {
        if ($this->page > 1) {
            $this->index = ($this->page - 1) * $this->perPage;
        } else {
            $this->index = 0;
        }

        return [
            Column::make('Order', 'setting_order')
                ->searchable()
                ->sortable(),
            Column::make('Nama', 'setting_name')
                ->searchable()
                ->sortable(),
            Column::make('Type', 'setting_input')
                ->searchable()
                ->sortable(),
            Column::make('Value', 'setting_value')
                ->asHtml()
                ->addClass("text-center")
                ->format(function ($value, $column, Setting $row) {
                    return view('livewire.setting._setting-value', compact('row'));
                }),

            Column::make("Action")
                ->asHtml()
                ->addClass("text-center")
                ->format(function ($value, $column, Setting $row) {
                    return view('livewire.setting._setting-action', compact('row'));
                }),
        ];
    }

    public function query(): Builder
    {
        return Setting::query();
    }
}
