<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Service extends JsonResource
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
            'service_id'=> $this->service_id,
            'service_name'=> $this->service_name,
            'service_price'=>$this->service_price,
            's_img_url'=>$this->s_img_url,
            'service_provider'=>$this->service_provider->service_provider_name,
            's_service_provider_id'=>$this->service_provider->service_provider_id,
            'service_category'=>$this->service_category->sc_name
        ];
    }
}