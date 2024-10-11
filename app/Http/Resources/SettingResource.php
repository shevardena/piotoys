<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use ProtoneMedia\Splade\FileUploads\ExistingFile;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'store_name' => $this->store_name,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_title,
            'og_image' => ExistingFile::fromMediaLibrary($this->getFirstMedia('og_image')),
            'logo' => ExistingFile::fromMediaLibrary($this->getFirstMedia('logo')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
