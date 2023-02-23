<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    protected $attributeNames = [
        'login' => '`Имя пользователя`',
        'email' => '`Email`',
        'phone' => '`Номер телефона`',
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
            'login' => 'required|min:4|max:17|unique:users',
            'email' => 'required|email|min:4|max:255|unique:users',
            'phone' => 'required|unique:users|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/',
            'password' => 'required|min:4|max:17|confirmed',
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
            'email.required' => 'Введите электронную почту.',
            'email.email' => 'Поле :attribute должно быть электронной почтой.',
            'phone.required' => 'Введите номер телефона.',
            'password.required' => 'Введите пароль.',
            'password.confirmed' => 'Пароли должны совпадать',
            'login.unique' => 'Такой логин уже существует.',
            'email.unique' => 'Такая почта уже существует.',
            'phone.unique' => 'Такой номер телефона уже существует.',
            'min' => 'Поле :attribute должно содержать не менее :min символов.',
            'max' => 'Поле :attribute должно содержать не более :max символов.',
            'phone.regex' => 'Номер телефона должен быть валидным',
        ];
    }
}
