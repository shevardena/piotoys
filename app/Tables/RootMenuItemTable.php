<?php

namespace App\Tables;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class RootMenuItemTable extends AbstractTable
{
    protected int|null $menu_id;
    public function __construct(Request $request)
    {
        $this->menu_id = $request->route('menu_id') ?? null;
    }

    public function authorize(Request $request)
    {
        return true;
    }

    public function for()
    {
        return MenuItem::query()->when($this->menu_id, function ($query) {
            return $query->where('menu_items.menu_id', $this->menu_id);
        });
    }

    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id', 'created_at','updated_at'])
            ->column('id', sortable: true)
            ->column(
                'created_at',
                sortable: true,
                as: fn($created_at) => $created_at->format('d M, Y H:i')
            )
            ->column(
                'updated_at',
                sortable: true,
                as: fn($updated_at) => $updated_at->format('d M, Y H:i')
            )
            ->column(label: 'Actions');
    }
}
