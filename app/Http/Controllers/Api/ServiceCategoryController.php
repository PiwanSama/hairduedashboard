<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

use App\Http\Resources\ServiceCategory as ServiceCategoryResource;
use App\Http\Resources\ServiceProvider as ServiceProviderResource;

class ServiceCategoryController extends Controller
{

    public function categories()
    {
      ServiceCategoryResource::withoutWrapping();
      return ServiceCategoryResource::collection(ServiceCategory::whereNull('parent_service_category_id')->get());
      
    }

    public function getProvidersByCategory($service_category_id){
       ServiceCategoryResource::withoutWrapping();
       return ServiceCategoryResource::collection(
         ServiceCategory::where('service_category_id',$service_category_id)
         ->get());
    }
    
}
