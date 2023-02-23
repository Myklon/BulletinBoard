<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    protected $attributeNames = [
        'login' => '`Имя пользователя`',
        'password' => '`Пароль`',
    ];
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'login' => 'required|min:4|max:17',
            'password' => 'required|min:4|max:17',
        ];
    }
    public function attributes()
    {
        return $this->attributeNames;
    }
    public function messages()
    {
        return [
            'login.required' => 'Введите логин.',
            'password.required' => 'Введите пароль.',
            'min' => 'Поле :attribute должно содержать не менее :min символов.',
            'max' => 'Поле :attribute должно содержать не более :max символов.',
        ];
    }
}
