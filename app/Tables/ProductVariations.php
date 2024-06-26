<?php

namespace App\Tables;

use App\Models\ProductVariation;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class ProductVariations extends AbstractTable
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
        return ProductVariation::query();
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
            ->column('name', sortable: true)
            ->column('slug', sortable: true)
            ->column('description', sortable: true)
            ->column('color', sortable: true)
            ->column('quantity', sortable: true)
            ->column('price', sortable: true)
            ->column('created_at', sortable: true)
            ->column('updated_at', sortable: true)
            ->column(label: 'Actions');
    }
}
