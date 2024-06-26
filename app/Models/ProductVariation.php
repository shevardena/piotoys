<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = ['color', 'slug', 'price', 'quantity', 'product_id'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = self::generateSlug($model);
        });

        static::updating(function ($model) {
            if ($model->isDirty('color')) {
                $model->slug = self::generateSlug($model);
            }
        });
    }

    public static function generateSlug($model)
    {
        $product = $model->product;
        return Str::slug($product->slug . '-' . $model->color);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
