<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_name' => 'required|string|max:100',
            'customer_lastname' => 'required|string|max:100',
            'customer_address' => 'required|string|max:100',
            'customer_telephone' => 'required|string|max:13',
            'customer_email' => 'nullable|email|max:255',
            'total' => 'required|numeric|between:0,9999.99',
        ];
    }
}
