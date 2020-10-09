<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'id'=> $this->product_id,
            'name'=> $this->product_name,
            'price'=>$this->product_price,
            'img_url'=>$this->p_img_url,
            'service_provider'=>$this->service_provider->service_provider_name,
            'service_category'=>$this->service_category->sc_name
        ];
    }
}
