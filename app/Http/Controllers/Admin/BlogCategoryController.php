<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(20);

        return view('admin.blog.categories.index', [
            'title' => 'Blog Categories',
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.blog.categories.create', [
            'title' => 'New Category',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
        ]);

        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['name']);

        Category::create($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Category created.');
        }

        return redirect()->route('admin.blog.categories.index')->with('success', 'Category created.');
    }

    public function edit(Category $category)
    {
        return view('admin.blog.categories.edit', [
            'title' => 'Edit Category',
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
        ]);

        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['name']);

        $category->update($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Category updated.');
        }

        return redirect()->route('admin.blog.categories.index')->with('success', 'Category updated.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.blog.categories.index')->with('success', 'Category deleted.');
    }
}
