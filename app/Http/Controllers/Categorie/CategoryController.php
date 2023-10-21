<?php

namespace App\Http\Controllers\Categorie;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return redirect()->route('dashboard-analytics', ['id' => 15])->with('categories', $categories);
    }
    

}
