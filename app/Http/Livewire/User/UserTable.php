<?php

namespace App\Http\Livewire\User;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class UserTable extends DataTableComponent
{

    public string $defaultSortColumn = 'name';
    public string $defaultSortDirection = 'asc';
    public bool $perPageAll = true;
//    public bool $reorderEnabled = true;

    public array $bulkActions = [
        'destroySelected' => 'Hapus Data Terpilih',
    ];

//    public function reorder($items): void
//    {
//        foreach ($items as $item) {
//            optional(User::find((int)$item['value']))->update(['sort' => (int)$item['order']]);
//        }
//    }

    protected int $index = 0;
    public string $primaryKey = "user_id";

    public function destroySelected()
    {
        User::whereIn($this->primaryKey, $this->selectedRowsQuery()->pluck($this->primaryKey))->delete();
        $this->emit("showToast", ["message" => "Users Deleted Successfully", "type"=>"success"]);
    }

    public function filters(): array
    {
        return [
            'role' => Filter::make('User Level')
                ->select([
                    '' => 'Any',
                    "super-admin" => 'Super Admin',
                    "admin" => 'Admin',
                ]),
        ];
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
            Column::make('Name','name')
                ->searchable()
                ->sortable(),
            Column::make('Username', 'username')
                ->searchable()
                ->sortable(),
            Column::make('E-mail', 'email')
                ->searchable()
                ->sortable(),
            Column::make('Role', 'role')
                ->searchable()
                ->sortable(),
            Column::make("Action")
                ->asHtml()
                ->addClass("text-center")
                ->format(function ($value, $column, User $row) {
                    return view('livewire.user._user-action', compact('row'));
                }),
        ];
    }

    public function query(): Builder
    {
        return User::query()
            ->when($this->getFilter('role'), function ($query, $role) {
                return $query->where('role', $role);
            });
    }
}
