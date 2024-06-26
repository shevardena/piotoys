<?php

namespace App\Tables;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use App\Models\ToyPurchase;

class ToyPurchases extends AbstractTable
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
        return ToyPurchase::query();
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
            ->withGlobalSearch(columns: ['id','name','guard_name'])
            ->column('id', sortable: true)
            ->column('name', sortable: true)
            ->column('slug', sortable: true)
            ->column('box_count', sortable: true)
            ->column('price_per_kg', sortable: true)
            ->column(
                'purchase_date',
                sortable: true,
                as: fn ($purchase_date, $toy_purchase) => $purchase_date->format('d F, Y')
            )
            ->column('amount_paid', sortable: true)
            ->column(label: 'Actions');
    }
}
