<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

use App\Http\Resources\Service as ServiceResource;

class ServiceController extends Controller
{
  public function categoryServices($category_id)
    { 
      return ServiceResource::collection(Service::where('s_service_category_id',$category_id)->paginate(),200);
    }

    public function service($service_id)
    {
      ServiceResource::withoutWrapping();
      return new ServiceResource(Service::find($service_id),200);
    }
}
