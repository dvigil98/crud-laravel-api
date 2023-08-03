<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'dni' => 'required',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'phone.required' => 'El teléfono es requerido',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser válido',
            'dni.required' => 'El DNI es requerido',
            'address.required' => 'La dirección es requerida'
        ];
    }
}
