<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $services = Service::all();
      return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $providers = ServiceProvider::all();
      $categories = ServiceCategory::all();
       return view('services.create', compact('categories', 'providers'));
    }

    /**
     * Service a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $service = new Service;
      $service->service_name = $request->service_name;
      $service->service_price = $request->service_price;
      $service->s_service_category_id = $request->s_service_category_id;
      $service->s_service_provider_id = $request->s_service_provider_id;

      if ($request->hasFile('s_img_url')) {
          $s_img_url = $request->file('s_img_url');
          $filename = 'img_'.$s_img_url->getClientOriginalName();
          strtolower($filename);
          $s_img_url->move('images/serviceimages/', $filename);

          $service->s_img_url = $filename;
      }

      $service->save();
      toastr()->success('Service added successfully!');
      return redirect('services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($service_id)
    {
        return Service::findOrFail($service_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($service_id)
    {
      $service = Service::find($service_id);
      $providers = ServiceProvider::all();
      $categories = ServiceCategory::all();
      return view('services.edit', compact('service','categories', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $service_id)
    {
      //Retrieve the service
      $service = Service::where('service_id', $service_id)->first();

      if ($service != null) {

          // Check if a service image has been uploaded
          if ($request->hasFile('s_img_url')) {
            $s_img_url = $request->file('s_img_url');
            $filename = 'img_'.$s_img_url->getClientOriginalName();
            $s_img_url->move('images/serviceimages/', $filename);
  
            $service->s_img_url = $filename;
        }

        if ($request->service_old_price) {
          $service->service_old_price = $request->service_old_price;
      }

      $service->service_name = $request->service_name;
      $service->service_price = $request->service_price;
      $service->s_service_category_id = $request->s_service_category_id;
      $service->s_service_provider_id = $request->s_service_provider_id;

        $service->save();
        toastr()->success('Service updated successfully!');
        return redirect('services');
    }

    toastr()->error('Service not found!');
    return redirect()->route('services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
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
