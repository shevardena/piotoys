<?php

namespace App\Http\Requests\Backend;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('create', Category::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|array',
            'name.*' => 'required|string|max:255',
            'description' => 'nullable|array',
            'description.*' => 'nullable|string',
            'meta_title' => 'nullable|array',
            'meta_title.*' => 'nullable|string|max:255',
            'meta_description' => 'nullable|array',
            'meta_description.*' => 'nullable|string',
            'is_active' => 'required|boolean',
        ];
    }
}
