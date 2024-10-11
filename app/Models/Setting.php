<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ProtoneMedia\Splade\FileUploads\ExistingFile;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;

class Setting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['name', 'type', 'store_name', 'meta_title', 'meta_description', 'phone', 'email', 'address', 'social_networks'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('og_image');
        $this->addMediaCollection('logo');
    }
}
