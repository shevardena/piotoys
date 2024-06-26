<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use ProtoneMedia\Splade\FileUploads\HasSpladeFileUploads;

class ImportProductImagesRequest extends FormRequest implements HasSpladeFileUploads
{
    public function rules()
    {
        return [
            'images' => 'required',
        ];
    }
}
