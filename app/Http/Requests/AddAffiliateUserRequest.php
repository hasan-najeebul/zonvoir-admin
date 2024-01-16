<?php

namespace App\Http\Requests;

use App\Rules\PolandZipCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class AddAffiliateUserRequest extends FormRequest
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
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $this->route('user'),
            'password'  => [
                'required',
                'min:8',
                'confirmed',
                Rule::notIn([$this->input('current_password')]),
            ],
            'street'     => 'required',
            'house_no'   => 'required',
            'city'       => 'required',
            'postal_code'   => ['required', new PolandZipCode],
        ];
    }
}
