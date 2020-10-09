<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceCategory extends JsonResource
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
            'service_category_id'=> $this->service_category_id,
            'parent_service_category_id'=> $this->parent_service_category_id,
            'sc_name'=>$this->sc_name,
            'sc_img_url'=>$this->sc_img_url
        ];
    }
}
