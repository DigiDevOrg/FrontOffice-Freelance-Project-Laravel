<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Navbar extends Controller
{
  public function index()
  {
    //get all Categories
    $categories = \App\Models\Category::all();
    //return the categories to the view 
    return view('content.user-interface.ui-navbar', compact('categories'));
  }
}
