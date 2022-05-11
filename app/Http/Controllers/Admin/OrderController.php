<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function insert(Request $request){
        $input = $request->all();
        $order = new Order;
        $order->name = $input['name'];
        $order->tel = $input['tel'];
        $order->address = $input['address'];
        $order->note = $input['note'];
        $order->status = 1;
        $order->total_price = $input['price-all'];
        $order->save();
        foreach($input['product_id'] as $key=>$val){
          
            $order->order_product()->attach($input['product_id'][$key],['quantity'=>$input['quantity'][$key]]);
        }

        $request->Session()->forget('cart');  
        

        return redirect()->route('cart')->with('success', 'Chúng tôi sẽ liên lạc sớm nhất');

    }  
    public function detail($id){
        $admin = Auth::guard('admin')->user();
        $order= Order::find($id);
        return view('admin.content.order.detail',compact('order','admin'));
    }
}
