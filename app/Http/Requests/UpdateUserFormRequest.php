<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserFormRequest extends FormRequest
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
            'name' => ['sometimes', 'nullable', 'string', 'min:1', 'max:30'],
            'email' => ['sometimes', 'nullable', 'email:dns', Rule::unique('users')->ignore(auth()->id())],
            'current_password' => ['sometimes', 'nullable', 'required_with:password', 'current_password'],
            'password' => ['sometimes', 'nullable', 'confirmed', Password::defaults()],
            'avatar' => ['sometimes', 'nullable', 'image', 'max:2048']
        ];
    }
}
