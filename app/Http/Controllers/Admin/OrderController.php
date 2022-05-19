<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use DB;
class OrderController extends Controller
{
    public function index(){
        $order = Order::all();
        return view('backend.content.order.index',compact('order'));
    }
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
        $order= DB::table('order_products')
        ->join('products','order_products.product_id','=','products.id')
        ->where('order_id','=',$id)
        ->select('*','order_products.quantity as soluong')
        ->get();
        return view('backend.content.order.detail',compact('order'));
    }
}
