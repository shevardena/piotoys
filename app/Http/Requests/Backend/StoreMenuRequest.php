<?php

namespace App\Http\Requests\Backend;

use App\Models\Menu;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreMenuRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('create', Menu::class);
    }

    public function rules()
    {

        return [
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ];
    }
}
