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
        return view('category.index', compact('categories'));
    }

    public function productsByCategory(Category $category)
    {
        $products = Product::where('category_id', $category->id)->orderByDesc('id')->paginate(16);
        return view('category.show', compact('category','products'));
    }
}
