<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthAdminRequest extends FormRequest
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
            'Correo_electronico' => 'required|email|max:255',
            'Contraseña' =>'required|min:8|max:255',
        ];
    }

    public function messages(): array{
        return [
            'Correo_electronico.required' => 'El correo electrónico es obligatorio.',
            'Correo_electronico.email' => 'El correo electrónico no es válido.',
            'Contraseña.required' => 'La contraseña es obligatoria.',
            'Contraseña.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'Contraseña.max' => 'La contraseña no puede tener más de 255 caracteres.',
        ];
    }
}
