<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            // 'dishes' => ['required', 'array', 'min:1', new ValidDishIds],
            'token' => 'required|string',
            'amount' => 'required',
            'restaurant_id' => 'required|integer|exists:restaurants,id',
            'customer_name' => 'required|string|min:3|max:255',
            'customer_lastname' => 'required|string|min:3|max:255',
            'customer_address' => 'string|max:255',
            'customer_email' => 'required',
            'customer_telephone' => 'required|string|max:15',
        ];
    }
}
