<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category:id,title'])->get();
        return view('product.index', compact('products'));
    }

    public function store(ProductStoreRequest $request)
    {
        $request->validated();
        $data = request(['title', 'category_id', 'description', 'price']);

        Product::create($data);
        return redirect()->route('products');
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function show(Product $product)
    {
        $categories = Category::all();
        return view('product.update', compact('product', 'categories'));
    }

    public function update(Product $product, ProductStoreRequest $request)
    {
        $request->validated();
        $data = request(['title', 'category_id', 'description', 'price']);

        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->category_id = $data['category_id'];

        $product->save();

        return redirect()->route('products');
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('products');
    }
}
