<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
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
            'name'          => 'required|string|max:255',
            'street'        => 'required|string|max:255',
            'number'        => 'required|string|max:10',
            'town'          => 'required|string|max:155',
            'postal_code'   => 'required|string|max:8',
            'mobile_number' => 'required|string|regex:/^\d{10}$/',
        ];
    }
}
