<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name)
        ]);

        return back()->with('success', 'Kategori berhasil ditambahkan!');
    }
}