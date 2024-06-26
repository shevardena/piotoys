<?php

namespace App\Http\Requests\Backend;

use App\Models\BackendUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('update', BackendUser::class);

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $adminId = $this->route('administrator');

        return [
            'first_name' => 'required|min:2|max:255',
            'last_name' => 'required|min:2|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('backend_users', 'email')->ignore($adminId),
            ],
            'login' => [
                'required',
                'min:2',
                'max:255',
                Rule::unique('backend_users', 'login')->ignore($adminId),
            ],
            'password' => 'sometimes|nullable|min:8|max:255',
            'super_admin' => 'sometimes|nullable|boolean',
            'roles' => 'sometimes|nullable|array',
            'permissions' => 'sometimes|nullable|array'
        ];
    }
}
