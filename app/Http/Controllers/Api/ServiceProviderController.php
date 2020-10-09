<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

use App\Http\Resources\ServiceProvider as ServiceProviderResource;

class ServiceProviderController extends Controller
{
    public function serviceProviders()
    {
      return ServiceProviderResource::collection(ServiceProvider::all());
    }

    public function serviceProvider($service_provider_id)
    {
      ServiceProviderResource::withoutWrapping();
      return new ServiceProviderResource(ServiceProvider::find($service_provider_id),200);
    }
}