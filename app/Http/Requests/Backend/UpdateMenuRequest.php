<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateMenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('update', \App\Models\Menu::class);
    }

    public function rules()
    {
        return [
            'name' => 'required|array',
            'name.*' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ];
    }
}
