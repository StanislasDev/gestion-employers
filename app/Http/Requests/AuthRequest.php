<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'L`\email est requis',
            'email.email' => 'Mauvais format de l`\email',
            'password.min:4' => 'Le mot de passe doit contenir au moins 4 caractères',
        ];
    }
}
