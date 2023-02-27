<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'old_password' => 'bail|required|min:4|max:17',
            'new_password' => 'bail|required|min:4|max:17|confirmed',
        ];
    }
//    public function messages()
//    {
//        return [
//            'old_password.required' => 'Введите старый пароль.',
//            'new_password.required' => 'Введите новый пароль.',
//            'new_password.confirmed' => 'Пароли должны совпадать',
//            'min' => 'Поле :attribute должно содержать не менее :min символов.',
//            'max' => 'Поле :attribute должно содержать не более :max символов.',
//        ];
//    }
}
