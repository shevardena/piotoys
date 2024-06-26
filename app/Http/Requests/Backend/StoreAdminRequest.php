<?php

namespace App\Http\Requests\Backend;

use App\Models\BackendUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create', BackendUser::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:2|max:255',
            'last_name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:backend_users',
            'login' => 'required|min:2|max:255|unique:backend_users',
            'password' => 'required|min:8|max:255',
            'super_admin' => 'sometimes|nullable|boolean',
            'roles' => 'sometimes|nullable|array',
            'permissions' => 'sometimes|nullable|array'
        ];
    }
}
