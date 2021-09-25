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
            'product_id'=> $this->product_id,
            'product_name'=> $this->product_name,
            'product_price'=>$this->product_price,
            'p_img_url'=>$this->p_img_url,
            'product_category'=>$this->product_category->pc_name,
            //'reviews'=>$this->reviews
        ];
    }
}
