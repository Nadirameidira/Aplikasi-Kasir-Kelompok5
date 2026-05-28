<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
       //
    }

    public function update(Request $request, Category $category)
    {
       //
    }

    public function destroy(Category $category)
    {
        //
    }
}