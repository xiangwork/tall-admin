<?php

namespace App\Http\Livewire\SliderMenu;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\SliderMenu;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class SliderMenuTable extends DataTableComponent
{

    use SliderMenuState;

    //public string $defaultSortColumn = '';
    //public string $defaultSortDirection = 'asc';
    public bool $perPageAll = true;

    public array $bulkActions = [
        'destroySelected' => 'Hapus Data Terpilih',
    ];

    protected int $index = 0;
    public string $primaryKey = "slider_id";

    public function destroySelected()
    {
        SliderMenu::whereIn($this->primaryKey, $this->selectedRowsQuery()->pluck($this->primaryKey))->delete();
        $this->emit("showToast", ["message" => "SliderMenus Deleted Successfully", "type" => "success"]);
    }

    public function columns(): array
    {
        if ($this->page > 1) {
            $this->index = ($this->page - 1) * $this->perPage;
        } else {
            $this->index = 0;
        }

        return [
            Column::make(__('No.'))->format(function () {
                return ++$this->index;
            }),

            Column::make('Title', 'slider_title')
                ->searchable()
                ->sortable(),
            Column::make('Image', 'slider_image')
                ->searchable()
                ->format(function ($value, $column, SliderMenu $row) {
                    return view('livewire.slidermenu._slidermenu-image', compact('row'));
                }),
            Column::make('Active', 'slider_active')
                ->searchable()
                ->asHtml()
                ->format(function ($value, $column, SliderMenu $row) {
                    return view('livewire.slidermenu._slidermenu-active', compact('row'));
                }),
            Column::make("Action")
                ->asHtml()
                ->format(function ($value, $column, SliderMenu $row) {
                    return view('livewire.slidermenu._slidermenu-action', compact('row'));
                }),
        ];
    }

    public function query(): Builder
    {
        return SliderMenu::query();
    }
}
