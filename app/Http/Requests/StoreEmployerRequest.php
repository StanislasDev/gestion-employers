<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployerRequest extends FormRequest
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
            'departement_id' => 'required|integer',
            'nom' => 'required|string',
            'prenaom' => 'required|string',
            'email' => 'required|email|unique:employers,email',
            'contact' => 'required|numeric|min:9|unique:employers,contact',
            'montant_journalier' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'L`email est requis',
            'email.unique' => 'Cette email est déjà utilisé',
            'contact.required' => 'Veillez saisir le contact de l`employer',
            'contact.unique' => 'Ce contact a déjà été utilisé',
        ];
    }
}
