<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormProductRequest;
use App\Models\Category;
use App\Models\File;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $meta = [
            'title' => 'Все объявления'
        ];
        $products = Product::orderByDesc("id")->paginate(16);

        return view('product.index', compact('meta','products'));
    }

    public function create()
    {
        $meta = [
            'title' => 'Создание объявления',
            'cover_info' => 'Обложка товара',
            'files_info' => 'Изображения товара',
            'button' => 'Добавить товар'
        ];
        $categories = Category::all();
        return view('product.form', compact('meta', 'categories'));
    }

    public function store(FormProductRequest $request)
    {
        $data = $request->except('cover', 'files', '_token');

        $data['user_id'] = 1;

        if($request->hasFile('cover')) {
            $cover = $request->cover->store('covers');
            $data['cover'] = $cover;
        }

        $product = Product::create($data);

        if($request->hasFile('files')) {
            foreach($request->file('files') as $file)
            {
                $filename = $file->store('files');
                File::create([
                    'product_id' => $product->id,
                    'path' => $filename,
                ]);
            }
        }
        return redirect()->route('product.show', $product->id);
    }

    public function edit(Product $product)
    {
        $meta = [
            'title' => 'Изменение объявления',
            'cover_info' => 'Заменить обложку',
            'files_info' => 'Заменить изображения',
            'button' => 'Изменить товар'
        ];
        $categories = Category::all();
        return view('product.form', compact('meta','categories', 'product'));
    }
    public function update(FormProductRequest $request, Product $product)
    {
        $data = $request->except('cover', 'files', '_token');

        $data['user_id'] = 1;

        if($request->hasFile('cover')) {
            if($product->cover === "covers/default.png")
            {
                $cover = $request->cover->store('covers');
                $data['cover'] = $cover;
            }
            else {
                $cover = $request->file('cover')->storeAs('', $product->cover);
            }
        }

        $product->update($data);

        if($request->hasFile('files')) {
            $files = File::where('product_id', $product->id)->get();
            if($files) {
                foreach($files as $file)
                {
                    Storage::delete($file->path);
                }
                File::where('product_id', $product->id)->delete();
            }
            foreach($request->file('files') as $file)
            {
                $filename = $file->store('files');
                File::create([
                    'product_id' => $product->id,
                    'path' => $filename,
                ]);
            }
        }
        return redirect()->route('product.show', $product->id);
    }

    public function remove(Product $product)
    {
        if($product->cover !== "covers/default.png")
        {
            Storage::delete($product->cover);
        }

        $files = File::where('product_id', $product->id)->get();
        if($files) {
            foreach($files as $file)
            {
                Storage::delete($file->path);
            }
            File::where('product_id', $product->id)->delete();
        }
        $product->delete();

        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        $meta = [
            'title' => "Объявление: $product->title"
        ];
        return view('product.show', compact('meta','product'));
    }
}
