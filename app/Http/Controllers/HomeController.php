<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $products   = Product::where('is_active', true)->latest()->get();
        $categories = Category::all();

        return view('home', compact('products', 'categories'));
    }
}