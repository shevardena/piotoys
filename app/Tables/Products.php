<?php

namespace App\Tables;

use App\Models\Product;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Products extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Product::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id','name','slug','description','meta_title','meta_description','is_active'])
            ->column('id', sortable: true)
            ->column('image', sortable: false)
            ->column('name', sortable: true)
            ->column('quantity', sortable: true)
            ->column('price', sortable: true)->column(
                'created_at',
                sortable: true,
                as: fn($created_at) => $created_at->format('d M, Y H:i')
            )
            ->column(
                'updated_at',
                sortable: true,
                as: fn($updated_at) => $updated_at->format('d M, Y H:i')
            )
            ->column(label: 'Actions')
        ->paginate(10);
    }
}
