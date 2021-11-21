<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

use App\Http\Resources\ServiceProvider as ServiceProviderResource;
use App\Http\Resources\ServiceProviderMap as ServiceProviderMapResource;

class ServiceProviderController extends Controller
{

  public function getProviders(){
    // /ServiceProviderResource::withoutWrapping();
    return ServiceProviderResource::collection(ServiceProvider::all());
 }

 public function getProvidersForMap(){
  ServiceProviderMapResource::withoutWrapping();
  return ServiceProviderMapResource::collection(
    ServiceProvider::where('is_sp_active',TRUE)
    ->get());
 }

  public function getProviderDetails($service_provider_id){
    ServiceProviderResource::withoutWrapping();
    return ServiceProviderResource::collection(
      ServiceProvider::where('is_sp_active',TRUE)
      ->where('service_provider_id',$service_provider_id)
      ->get());
  }
}
