<?php

namespace App\Http\Controllers\Categorie;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('Category.categories', compact('categories'));
    }
}
