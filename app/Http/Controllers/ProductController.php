<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store()
    {
        $data = \request()->validate([
            'title' => 'string',
            'description' => 'string',
            'price' => 'numeric'
        ]);
//        Product::create($data);
        # привязать к категории
        # сделать картинки
        # привязать к пользователю
        return redirect()->route('post.index');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }
}
