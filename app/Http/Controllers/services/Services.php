<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
class Services  extends Controller
{

  //get all 
  public function index()
  {
    $services = Service::all();
    return view('content.Services.services-basic', compact('services'));
  }
  //get service by idCategorie 
  public function getServiceByIdCategorie($idCategorie)
  {
    $services = Service::where('category_id', $idCategorie)->get();
    return view('content.Services.services-basic', compact('services'));
  }

  //get service by id
  public function getServiceById($id)
  {
    $service = Service::find($id);
    return view('content.Services.service-details', compact('service'));
  }
  
  //get service by id user
  public function getServiceByIdUser($id)
  {
    $services = Service::where('user_id', $id)->get();
    // get user  name from services
    foreach ($services as $service) {
      $service->user_name = $service->user->name;
    }
    return view('content.Services.services-basic', compact('services'));
  }
  
  public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'delivery_time' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Set the default user ID to 15
        $validatedData['user_id'] = 15;

        // Create a new service with the validated data
        $service = Service::create($validatedData);

        // Redirect back with a success message or to a different page
        return redirect()->route('dashboard-analytics', ['id' => 15]);
      }


}
