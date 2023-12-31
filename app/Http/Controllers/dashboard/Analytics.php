<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class Analytics extends Controller
{
    public function index()
    {
        $services1 = Service::all();
        $id = 15;
        $categories = Category::all();
        $services = Service::where('user_id', $id)->get();
        foreach ($services as $service) {
            $name = $service->user->name;
        }
        $name = 'Ibrahim';
        // if name == Undefined variable
        if (!isset($name)) {
            return view('content.Services.services-basic', compact('services1'));
        } else {
            return view('content.dashboard.dashboards-analytics', compact('services', 'categories', 'name'));
        }
    }

    public function create($id = 15)
    {
        $categories = Category::all();

        return view('content.dashboard.dashboards-analytics', compact('categories'));
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
        $service = new Service([
          'title' => $validatedData['title'],
          'description' => $validatedData['description'],
          'price' => $validatedData['price'],
          'delivery_time' => $validatedData['delivery_time'],
          'category_id' => $validatedData['category_id'],
      ]);

        // Create a new service with the validated data
        $service->save();

        // Redirect back with a success message or to a different page
        return redirect()->route('dashboard-analytics', ['id' => 15]);
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('dashboard-analytics', ['id' => 15]);
    }

    public function edit($id)
    {
        $services = Service::where('user_id', 15)->get();

        $service = Service::findOrFail($id);
        $categories = Categorie::all();

        return view('content.dashboard.dashboards-analytics', compact('service', 'categories', 'services'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
          'title' => 'required|string|max:255',
          'description' => 'required|string',
          'price' => 'required|numeric',
          'delivery_time' => 'required|integer',
          'category_id' => 'required|exists:categories,id',
  ]);

        $service = Service::findOrFail($id);
        $service->update($validatedData);

        return redirect()->route('dashboard-analytics', ['id' => 15]);
    }
}
