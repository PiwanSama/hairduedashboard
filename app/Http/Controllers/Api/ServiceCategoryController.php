<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

use App\Http\Resources\ServiceCategory as ServiceCategoryResource;

class ServiceCategoryController extends Controller
{

    public function categories()
    {
      ServiceCategoryResource::withoutWrapping();
      return ServiceCategoryResource::collection(ServiceCategory::whereNull('parent_service_category_id')->get());
      
    }

    public function getChildCategories($parent_category_id)
    {
      ServiceCategoryResource::withoutWrapping();
      return ServiceCategoryResource::collection(ServiceCategory::where('parent_service_category_id',$parent_category_id)->get());
    }
}
