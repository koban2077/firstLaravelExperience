<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
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
        $data = request(['title', 'description', 'price']);
        Product::create($data);
        return redirect()->to('products');
    }

    public function create()
    {
        return view('product.create');
    }

    public function show(Product $product)
    {
        return view('product.update', compact('product'));
    }

    public function update(Product $product, ProductStoreRequest $request)
    {
        $request->validated();
        $data = request(['title', 'description', 'price']);

        Product::where('id', $product['id'])
            ->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'price' => $data['price']
            ]);

        return redirect()->to('products');
    }

    public function delete(Product $product)
    {
        DB::table('products')->where('id', '=', $product['id'])
            ->delete();
        return redirect()->to('products');
    }
}
