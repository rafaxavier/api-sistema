<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalonRequest  extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'description' => 'nullable|max:200',
            'email' => 'required|email|max:50|unique:users',
            'phone' => 'required|regex:/^\(\d{2}\)\d{4,5}\-\d{4}$/',
            'street' => 'required|max:50',
            'number' => 'required|max:10',
            'district' => 'required|max:40',
            'city' => 'required|max:40',
            'state' => 'required|size:2',
            'zip_code' => 'required|regex:/^\d{5}\-\d{3}$/',
            'password' => 'required|min:8|confirmed',
            'access_type' => 'in:admin,professional,reception',
        ];
    }


    public function messages()
    {
        return [
            'required' => 'campo :attribute é obrigatório',
            'email.unique'=>'Este email já esta sendo utilizado.',
            'phone.regex' => 'O formato do telefone é inválido. Use (99)9999-9999.',
            'zip_code.regex' => 'O formato do CEP é inválido. Use 99999-999.',
            'password.min' => 'A senha deve conter no mínimo 8 caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
            'access_type.in' => 'O campo access_type deve ser um dos seguintes valores: admin, professional, reception.',
            'size' => 'O campo :attribute deve ter :size caracteres.',
            'max' => 'O campo :attribute não deve ter mais de :max caracteres.',
        ];
    }
}
