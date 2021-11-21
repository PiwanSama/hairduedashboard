<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Tag;

class ServiceProviderMap extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->service_provider_id,
            'name'=>$this->service_provider_name,
            'lat'=>$this->sp_location_lat,
            'lng'=>$this->sp_location_lng,
        ];
    }
}
