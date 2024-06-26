<?php

namespace App\Http\Requests\Backend;

use App\Models\ToyPurchase;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreToyPurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('create', ToyPurchase::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'box_count' => 'required',
            'price_per_kg' => 'required',
            'purchase_date' => 'required',
            'amount_paid' => 'required',
        ];
    }
}
