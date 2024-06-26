<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToyPurchase extends Model
{
    use HasFactory,  HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected $casts = [
        'purchase_date' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'box_count',
        'price_per_kg',
        'purchase_date',
        'amount_paid',
    ];
}
