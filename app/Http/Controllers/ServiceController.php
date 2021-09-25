<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    public function index()
    {
      $services = Service::all();
      return view('services.index', compact('services'));
    }

    public function create()
    {
      $providers = ServiceProvider::all();
      $categories = ServiceCategory::all();
      return view('services.create', compact('categories', 'providers'));
    }

    public function store(Request $request)
    {
      $service = Service::create($request->all());

      if ($request->hasFile('s_img_url')) {
          $s_img_url = $request->file('s_img_url');
          $filename = 'img_'.$s_img_url->getClientOriginalName();
          strtolower($filename);
          $s_img_url->move('images/serviceimages/', $filename);
          $service->s_img_url = $filename;
          $service->save();
      }
      toastr()->success('Service added successfully!');
      return redirect('services');
    }

    public function show($service_id)
    {
        return Service::findOrFail($service_id);
    }

    public function edit($service_id)
    {
      $service = Service::find($service_id);
      $providers = ServiceProvider::all();
      $categories = ServiceCategory::all();
      return view('services.edit', compact('service','categories', 'providers'));
    }

    public function update(Request $request, $service_id)
    {
      //Retrieve the service
      $service = Service::where('service_id', $service_id)->first();

      if ($service != null) {
          $service = Service::create($request->all());
          // Check if a service image has been uploaded
          if ($request->hasFile('s_img_url')) {
            $s_img_url = $request->file('s_img_url');
            $filename = 'img_'.$s_img_url->getClientOriginalName();
            $s_img_url->move('images/serviceimages/', $filename);
  
            $service->s_img_url = $filename;
            $service->save();
        }        
        toastr()->success('Service updated successfully!');
        return redirect('services');
    }

    toastr()->error('Service not found!');
    return redirect()->route('services');
    }

    public function destroy($service_id)
    {
      //Retrieve the service
        $service = Service::where('service_id', $service_id)->first();

        if ($service != null) {
            $service->delete();
            toastr()->success('Service deleted successfully!');
            return redirect()->route('services');
        }

        toastr()->error('Service not found!');
        return redirect()->route('services');
      }

}
