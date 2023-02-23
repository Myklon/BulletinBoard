<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $meta = [
              'title' => 'Все категории'
            ];
        $categories = Category::all();
        return view('category.index', compact('meta', 'categories'));
    }

    public function productsByCategory(Category $category)
    {
        $meta = [
            'title' => "Категория: $category->title",
        ];
        $products = Product::where('category_id', $category->id)->orderByDesc('id')->paginate(16);
        return view('product.index', compact('meta','products'));
    }
}
