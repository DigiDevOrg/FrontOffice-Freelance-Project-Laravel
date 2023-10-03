<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Services  extends Controller
{
  public function index()
  {
    return view('content.Services.services-basic');
  }
}
