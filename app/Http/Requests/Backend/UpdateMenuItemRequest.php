<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateMenuItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('update', \App\Models\MenuItem::class);
    }

    public function rules()
    {
        return [
            // validation rules
        ];
    }
}
