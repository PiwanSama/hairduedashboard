<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceProvider extends JsonResource
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
            'id'=> $this->service_provider_id,
            'name'=>$this->service_provider_name,
            'lat'=>$this->sp_lat,
            'lng'=>$this->sp_lng,
            'address'=>$this->sp_address,
            'opening_time'=>$this->sp_opening_time,
            'closing_time'=>$this->sp_closing_time,
            'rating'=>$this->sp_rating,
            'whatsapp_contact'=>$this->sp_whatsapp_contact,
            'primary_contact'=>$this->sp_primary_contact,
            'secondary_contact'=>$this->sp_secondary_contact,
            'img_url'=>$this->sp_img_url,
            'services'=>$this->services,
            'categories'=>$this->service_categories,
            'products'=>$this->products,
            'reviews'=>$this->reviews
        ];
    }
}
