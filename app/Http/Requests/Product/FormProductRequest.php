<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormProductRequest extends FormRequest
{
//    protected $attributeNames = [
//        'title' => '`Название товара`',
//        'short_description' => '`Краткое описание`',
//        'description' => '`Описание товара`',
//        'price' => '`Цена`',
//        'category_id' => '`Категория`',
//        'cover' => '`Обложка товара`',
//        'files' => '`Картинки товара`',
//    ];

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
            'title' => 'required|string|min:4|max:200',
            'short_description' => 'required|string|min:5|max:300',
            'description' => 'required|string|min:5|max:10000',
            'price' => 'required|numeric|min:0',
            'cover' => 'image|max:2000',
            'files' => 'max:3',
            'files.*' => 'image|max:2000',
            'category_id' => 'required|numeric'
        ];
    }

//    public function attributes()
//    {
//        return $this->attributeNames;
//    }

//    public function messages()
//    {
//        return [
//            'title.required' => 'Введите название товара.',
//            'short_description.required' => 'Введите краткое описание.',
//            'description.required' => 'Введите описание товара.',
//            'price.required' => 'Введите цену товара.',
//            'category.required' => 'Выберите категорию.',
//            'category_id.exists' => 'Такой категории не существует.',
//            'min' => 'Поле :attribute должно содержать не менее :min символов.',
//            'price.min' => 'Цена не может быть меньше 0',
//            'max' => 'Поле :attribute должно содержать не более :max символов.',
//            'string' => 'Поле :attribute должно быть строкой.',
//            'numeric' => 'Поле :attribute должно быть числом.',
//            'image' => 'Поле :attribute должно быть изображением.',
//            'cover.max' => 'Размер обложки не должен превышать :max килобайт.',
//            'files.max' => 'Изображений должно быть не больше :max',
//            'files.*.image' => 'Изображения должны быть изображениями',
//            'files.*.max' => 'Изображения не должны превышать :max килобайт'
//        ];
//    }
}
