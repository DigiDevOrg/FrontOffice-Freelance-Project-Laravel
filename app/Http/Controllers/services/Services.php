<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Skills;

class Services extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('content.Services.services-basic', compact('services'));
    }

    public function getServiceByIdCategorie($idCategorie)
    {
        $services = Service::where('Category', $idCategorie)->get();
        $skills = Skills::where('category_id', $idCategorie)->get();

        return view('content.Services.services-basic', compact('services' , 'skills'));
    }

    public function getServiceById($id)
    {
        $service = Service::find($id);

        return view('content.Services.service-details', compact('service'));
    }

    // get service by id user
    public function getServiceByIdUser($id)
    {
        $services = Service::where('user_id', $id)->get();
        // get user  name from services
        foreach ($services as $service) {
            $service->user_name = $service->user->name;
        }

        return view('content.Services.services-basic', compact('services'));
    }
}
