<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource {
    public function toArray($request){
        return [
            'id' => $this->order_id,
            'order_date'=> $this->order_date,
            'delivery_address'=> $this->delivery_address,
            'total'=> $this->total_cost,
            'status'=> $this->status,
        ];
    }
}
?>