<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChangePhoneRequest extends FormRequest
{
    protected $attributeNames = [
        'phone' => '`Номер телефона`',
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
            'phone' => [
                'bail',
                'required',
                'regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/',
                'unique:users'
//                Rule::unique('users')->ignore($user->id),
                ]
        ];
    }
    public function attributes()
    {
        return $this->attributeNames;
    }
    public function messages()
    {
        return [
            'phone.unique' => 'Такой номер телефона уже существует.',
            'phone.regex' => 'Номер телефона должен быть валидным',
        ];
    }
}
