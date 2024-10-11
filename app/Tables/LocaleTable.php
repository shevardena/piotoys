<?php

namespace App\Tables;

use App\Models\Locale;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class LocaleTable extends AbstractTable
{
    public function __construct()
    {
        //
    }

    public function authorize(Request $request)
    {
        return true;
    }

    public function for()
    {
        return Locale::query();
    }

    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id', 'created_at','updated_at'])
            ->column('id', sortable: true)
            ->column('name', sortable: true)
            ->column('short_name', sortable: true)
            ->column('code', sortable: true)
            ->column('icon', sortable: true)
            ->column('is_active', sortable: true)
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
