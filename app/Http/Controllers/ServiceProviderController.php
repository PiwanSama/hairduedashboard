<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceProviderController extends Controller
{

    public function index()
    {
      $providers= ServiceProvider::all();
      return view('providers.index', compact('providers'));
    }

    public function create()
    {
       return view('providers.create');
    }

    public function store(Request $request)
    {
      $service_provider = ServiceProvider::create($request->all());

      if ($request->hasFile('sp_id_front')) {
          $service_provider_image = $request->file('sp_id_front');
          $filename = 'img_'.$service_provider_image->getClientOriginalName();
          strtolower($filename);
          $service_provider_image->move('images/spimages/', $filename);
          $service_provider->sp_id_front = $filename;
          $service_provider->save();
      }
      if ($request->hasFile('sp_id_back')) {
        $sp_id_back = $request->file('sp_id_back');
        $filename = 'img_'.$sp_id_back->getClientOriginalName();
        strtolower($filename);
        $sp_id_back->move('images/spimages/', $filename);
        $service_provider->sp_id_back = $filename;
        $service_provider->save();
    }
      if ($request->hasFile('sp_coverphoto_url')) {
        $sp_id_back = $request->file('sp_coverphoto_url');
        $filename = 'img_'.$sp_id_back->getClientOriginalName();
        strtolower($filename);
        $sp_id_back->move('images/spcoverimages/', $filename);
        $service_provider->sp_coverphoto_url = $filename;
        $service_provider->save();
    }
      toastr()->success('Service provider added successfully!');
      return redirect('providers');
    }

    public function show($service_provider_id)
    {
        return ServiceProvider::findOrFail($service_provider_id);
    }

    public function edit($service_provider_id)
    {
      $provider = ServiceProvider::find($service_provider_id);
      return view('providers.edit', compact('provider'));
    }

    public function update(Request $request, $service_provider_id)
    {
      
      //Retrieve the service_provider
      $service_provider = ServiceProvider::where('service_provider_id', $service_provider_id)->first();

      if ($service_provider != null) {

          $service_provider = ServiceProvider::create($request->all());
          // Check if a service_provider image has been uploaded
          if ($request->hasFile('sp_id_img')) {
            $sp_cover_img = $request->file('sp_id_img');
            $filename = 'img_'.$sp_cover_img->getClientOriginalName();
            strtolower($filename);
            $sp_cover_img->move('images/spimages/', $filename);
  
            $service_provider->sp_id_img = $filename;
            $service_provider->save();
          }

        toastr()->success('Service provider updated successfully!');
        return redirect('providers');
    }

    toastr()->error('Service provider not found');
    return redirect()->route('providers');
    }
    
    public function destroy($service_provider_id)
    {
      //Retrieve the service_provider
        $service_provider = ServiceProvider::where('service_provider_id', $service_provider_id)->first();

        if ($service_provider != null) {
            $service_provider->delete();
            toastr()->success('Service provider deleted successfully!');
            return redirect()->route('providers.index');
        }

        toastr()->error('Service provider not found');
        return redirect()->route('providers.index');
      }

}
