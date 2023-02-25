<?php

namespace App\Http\Requests\Product;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class FormProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Category::find($this->category_id)->exists();
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
            'category_id' => 'required|numeric',
        ];
    }
}
