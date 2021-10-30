<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\Order as OrderResource;

class OrderController extends Controller{

    public function postOrder(Request$request){
        $order = Order::create($request->all());
        return (new OrderResource(Order::find($order->order_id)))->response()->setStatusCode(201);
    }

    public function getOrder($order_id){
        $order = (Order::where('order_id',$order_id)->get());
        if($order->isEmpty()){
            return response()->json(["error"=>"Order not found"], 404);
        }else{
            return (new OrderResource(Order::find($order_id)))->response()->setStatusCode(201);
        }
    }

}

?>