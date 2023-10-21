<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use App\Models\Category;

class Navbar extends Controller
{
    public function index()
    {
        // get all Categories
        $categories = Category::all();
        dd($categories);

        // return the categories to the view
        return view('content.user-interface.ui-navbar', compact('categories'));
    }
}
