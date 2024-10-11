<?php

namespace App\Http\Requests\Backend;

use App\Models\Setting;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('update', Setting::class);
    }

    public function rules()
    {
        $rules = [
            'name' => 'required',
            'type' => 'required|in:website_parameters,contact_information',
        ];

        if ($this->input('type') === 'website_parameters') {
            $rules['store_name'] = 'required';
            $rules['meta_title'] = 'nullable|string';
            $rules['meta_description'] = 'nullable|string';
            $rules['og_image'] = 'nullable';
            $rules['logo'] = 'nullable';
        }

        if ($this->input('type') === 'contact_information') {
            $rules['phone'] = 'required';
            $rules['email'] = 'required';
            $rules['address'] = 'string';
            $rules['social_networks'] = 'nullable';
            $rules['social_networks.*'] = 'string';
        }

        return $rules;
    }
}
