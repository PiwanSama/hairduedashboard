<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{

    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_id',
        'order_date',
        'delivery_address',
        'total_cost',
        'user_id',
        'status',
        'created_at',
        'updated_at'
    ];

    public function products(){
        return $this->belongsToMany('App\Models\Products');
    }

}

?>