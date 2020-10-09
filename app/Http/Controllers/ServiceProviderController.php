<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceProviderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $providers= ServiceProvider::all();
      return view('providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('providers.create');
    }

    /**
     * Service Provider a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $service_provider = new ServiceProvider;
      $service_provider->service_provider_name = $request->service_provider_name;
      $service_provider->sp_location = $request->sp_location;
      $service_provider->sp_address = $request->sp_address;
      $service_provider->sp_opening_time = $request->sp_opening_time;
      $service_provider->sp_closing_time = $request->sp_closing_time;
      $service_provider->sp_rating = $request->sp_rating;
      $service_provider->sp_whatsapp_contact = $request->sp_whatsapp_contact;
      $service_provider->sp_primary_contact = $request->sp_secondary_contact;
      $service_provider->sp_secondary_contact = $request->sp_opening_time;

      if ($request->hasFile('sp_img_url')) {
          $service_provider_image = $request->file('sp_img_url');
          $filename = 'img_'.$service_provider_image->getClientOriginalName();
          strtolower($filename);
          $service_provider_image->move('images/spimages/', $filename);

          $service_provider->sp_img_url = $filename;
      }

      $service_provider->save();
      toastr()->success('Service provider added successfully!');
      return redirect('providers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service Provider  $service_provider
     * @return \Illuminate\Http\Response
     */
    public function show($service_provider_id)
    {
        return ServiceProvider::findOrFail($service_provider_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service Provider  $service_provider
     * @return \Illuminate\Http\Response
     */
    public function edit($service_provider_id)
    {
      $provider = ServiceProvider::find($service_provider_id);
      return view('providers.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service Provider  $service_provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $service_provider_id)
    {
      //Retrieve the service_provider
      $service_provider = ServiceProvider::where('service_provider_id', $service_provider_id)->first();

      if ($service_provider != null) {

          // Check if a service_provider image has been uploaded
          if ($request->hasFile('sp_img_url')) {
            $service_provider_image = $request->file('sp_img_url');
            $filename = 'img_'.$service_provider_image->getClientOriginalName();
            strtolower($filename);
            $service_provider_image->move('images/spimages/', $filename);
  
            $service_provider->sp_img_url = $filename;
        }

        $service_provider->service_provider_name = $request->service_provider_name;
        $service_provider->sp_location = $request->sp_location;
        $service_provider->sp_address = $request->sp_address;
        $service_provider->sp_opening_time = $request->sp_opening_time;
        $service_provider->sp_closing_time = $request->sp_closing_time;
        $service_provider->sp_rating = $request->sp_rating;
        $service_provider->sp_whatsapp_contact = $request->sp_whatsapp_contact;
        $service_provider->sp_primary_contact = $request->sp_secondary_contact;
        $service_provider->sp_secondary_contact = $request->sp_opening_time;

        $service_provider->save();
        toastr()->success('Service provider updated successfully!');
        return redirect('providers');
    }

    toastr()->error('Service provider not found');
    return redirect()->route('providers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service Provider  $service_provider
     * @return \Illuminate\Http\Response
     */
    public function destroy($service_provider_id)
    {
      //Retrieve the service_provider
        $service_provider = ServiceProvider::where('service_provider_id', $service_provider_id)->first();

        if ($service_provider != null) {
            $service_provider->delete();
            toastr()->success('Service provider deleted successfully!');
            return redirect()->route('providers');
        }

        toastr()->error('Service provider not found');
        return redirect()->route('providers');
      }

}
