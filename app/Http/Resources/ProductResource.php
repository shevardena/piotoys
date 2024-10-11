<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use ProtoneMedia\Splade\FileUploads\ExistingFile;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'purchase_id' => $this->purchase_id,
            'categories' => $this->categories,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_title,
            'og_image' => ExistingFile::fromMediaLibrary($this->getFirstMedia('og_image')),
            'image' => ExistingFile::fromMediaLibrary($this->getFirstMedia('image')),
            'images' => ExistingFile::fromMediaLibrary($this->getMedia('images')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
