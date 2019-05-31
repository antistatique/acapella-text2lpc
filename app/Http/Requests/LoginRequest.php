<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'password' => 'required|min:6',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Le nom d\'utilisateur est requis',
            'name.min' => 'Le nom doit au moins comporter 2 caractères',
            'password.required' => 'Le mot de passe est requis',
            'password.min' => 'Le mot de passe doit au moins comporter 6 caractères',
        ];
    }
}
