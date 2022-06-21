<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use DB;
class HomeController extends Controller
{
    public function index(){
        $order = Order::all();
        $product = Product::all();
        $gia_tong = 0;
        $total_budget= 0;
        foreach($order as $val){
            $gia_order = $val->total_price;
            $gia_tong += $gia_order;
        }
        foreach($product as $val){
            $budget = $val->price * $val->quantity;
            $total_budget +=   $budget;
        }

        $order_new = DB::table('orders')
        ->where('status',1)
        ->get();
        $order_call = DB::table('orders')
        ->where('status',2)
        ->get();
        $order_delivery = DB::table('orders')
        ->where('status',3)
        ->get();
        $order_finish = DB::table('orders')
        ->where('status',4)
        ->get();
        $order_cancel = DB::table('orders')
        ->where('status',5)
        ->get();
        $count_new = count($order_new);
        $count_call = count($order_call);
        $count_delivery = count($order_delivery);
        $count_finish = count($order_finish);
        $count_cancel = count($order_cancel);
        return view('backend.content.dashboard.index',compact('order','count_new','count_call','count_delivery','count_finish','count_cancel','gia_tong','total_budget'));
    }
}
