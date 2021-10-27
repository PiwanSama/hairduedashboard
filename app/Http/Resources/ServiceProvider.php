<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Tag;

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
            'img'=>$this->sp_coverphoto_url,
            'lat'=>$this->sp_location_lat,
            'lng'=>$this->sp_location_lng,
            'address'=>$this->sp_address,
            'rating'=>$this->sp_rating,
            'whatsapp_contact'=>$this->sp_whatsapp_contact,
            'primary_contact'=>$this->sp_primary_contact,
            'secondary_contact'=>$this->sp_secondary_contact,
            'img_url'=>$this->sp_id_img,
            'is_active'=>$this->is_sp_active,
            'tags'=>Tag::collection($this->tags)
        ];
    }
}
