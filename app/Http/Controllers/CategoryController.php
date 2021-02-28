<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public static function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create_form');
    }

    public function store(CategoryStoreRequest $request)
    {
        $request->validated();
        $data = $request->only(['title', 'description']);
        Category::create($data);
        return redirect()->route('categories');
    }

    public function show(Category $category)
    {
        return view('category.update_form', compact('category'));
    }

    public function update(Category $category, CategoryUpdateRequest $request)
    {
        $request->validated();
        $data = $request->only(['title', 'description']);

        $category->update($data);

        return redirect()->route('categories');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('categories');
    }
}
