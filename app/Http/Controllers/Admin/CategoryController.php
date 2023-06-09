<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $title = "Categories";
        $categories = Category::latest()->paginate(10)->withQueryString();
        if ($request->has('search')) {
            $categories = Category::where('name', 'like', "%{$request->search}%")->paginate(10)->withQueryString();
        }

        return view('admin.categories.index', compact('title', 'categories'));
    }

    public function create()
    {
        $title = "Create Category";

        return view('admin.categories.create', compact('title'));
    }
 
    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug(request('name')),
        ]);

        return redirect()->route('categories.index')->with('message', 'Category created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        $title = "Edit Category";

        return view('admin.categories.edit', compact('title', 'category'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug(request('name')),
        ]);

        return redirect()->route('categories.index')->with('message', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('message', 'Category deleted successfully');
    }
}
