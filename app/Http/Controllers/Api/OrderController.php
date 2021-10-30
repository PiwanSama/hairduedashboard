<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Http\Resources\Order as OrderResource;

class OrderController extends Controller{

    public function postOrder(Request $request){
        $order = Order::create($request->all());
        return (new OrderResource(Order::find($order->order_id)))->response()->setStatusCode(201);
    }

    public function postOrderProducts(Request $request){
        $cart = $request->all();
        foreach($cart as $cartItem){
            $op = new OrderProduct();
            $op->order_id = $cartItem['order_id'];
            $op->product_id = $cartItem['product_id'];
            $op->quantity = $cartItem['quantity'];
            $op->unit_price = $cartItem['unit_price'];  
            $op->save();      
        }
        return response()->json(["message"=>"Success"], 200);
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