<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use DB;
use Carbon;
class OrderController extends Controller
{
    public function index(){
        $order = DB::table('orders')
        ->where('status',1)
        ->get();
        $order_call = DB::table('orders')
        ->select('*')
        ->where('receive',session('acc')[0]->id)
        ->where('status',2)
        ->get();
        $order_delivery = DB::table('orders')
        ->select('*')
        ->where('status',3)
        ->get();
        if(count($order_call) != 0 ){
            return view('backend.content.order.edit',compact('order_call'));
        }
        if(count($order_delivery) != 0 ){
            return view('backend.content.order.delivery',compact('order_delivery'));
        }
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
        $order_id = $id;
        return view('backend.content.order.detail',compact('order','order_id'));
    }
    public function get_call(Order $order,Request $request){
        $input = $request->all();
        $id = $input['id'];
        $order_call = Order::find($id);
        // if($order_call->trangthai == 1)
        // {
        //     // Đơn chưa có ai nhận
        // }
        // else
        // {
        //     // Đơn đã có người nhận
        //     return redirect()->route('admin.order');
        // }
        if(isset($input['goi'])){
            $arr = [
                'status'=>2,
                'receive'=>session('acc')[0]->id
            ];
            $order->where('id',$id)->update($arr);
            $order_call = DB::table('orders')
            ->select('*')
            ->where('receive',session('acc')[0]->id)
            ->where('status',2)
            ->get();
            return view('backend.content.order.edit',compact('order_call'));
        }
        if(isset($input['huy'])){
            $arr = [
                'status'=>5,
                'receive'=>session('acc')[0]->id,
                'updated_at'=> Carbon\Carbon::now()
            ];
            $order->where('id',$id)->update($arr);
            $order_cancel = DB::table('orders')
            ->select('*')
            ->where('id',$id)
            ->where('receive',session('acc')[0]->id)
            ->where('status',5)
            ->get();
            return view('backend.content.order.huy',compact('order_cancel'));
        }    
    }

    public function order_confirm($id){
        $order = Order::find($id);
        $order_detail= DB::table('order_products')
        ->join('products','order_products.product_id','=','products.id')
        ->where('order_id','=',$id)
        ->select('*','order_products.quantity as soluong','order_products.product_id as sanpham')
        ->get();
        return view('backend.content.order.confirm',compact('order','order_detail'));
    }
    public function order_response(Order $order,Request $request,Product $products){
        $input = $request->all();
        if(isset($input['xuat'])){
            // xu li xuat hang
            $product = DB::table('products')
            ->select('quantity','id')
            ->get();
            foreach($input['sanpham'] as $key =>$value){
                $arr_sp[$key]['sanpham'] =  $input['sanpham'][$key];
                $arr_sp[$key]['soluong'] = $input['soluong'][$key];
                $soluong =    (int) $arr_sp[$key]['soluong'];
                $id = (int) $arr_sp[$key]['sanpham'];
                if($soluong >0){
                    foreach($product as $val){
                        if($val->id == $id){
                            $val->quantity -=  $soluong;
                            $products->where('id',$id)->update(['quantity'=>$val->quantity]);           
                        }
                    }
                }
            }
            // Xu li trang thai
            $arr = [
                'status'=>3,
            ];
            $order->where('id',$id)->update($arr);
            $order_delivery = DB::table('orders')
            ->select('*')
            ->where('status',3)
            ->get();
            return view('backend.content.order.delivery',compact('order_delivery'));
        }
        if(isset($input['huy'])){
            $arr = [
                'status'=>5,
                'updated_at'=> Carbon\Carbon::now()
            ];
            $order->where('id',$id)->update($arr);
            $order_cancel = DB::table('orders')
            ->select('*')
            ->where('id',$id)
            ->where('receive',session('acc')[0]->id)
            ->where('status',5)
            ->get();
            return view('backend.content.order.huy',compact('order_cancel'));
        }
    }

    public function order_final($id){
        $order = Order::find($id);
        $order_final= DB::table('order_products')
        ->join('products','order_products.product_id','=','products.id')
        ->where('order_id','=',$id)
        ->select('*','order_products.quantity as soluong','order_products.product_id as sanpham')
        ->get();
        return view('backend.content.order.final',compact('order','order_final'));
    }

    public function order_finish(Order $order,Request $request,Product $products){
        $input = $request->all();
        $id = $input['id'];
        if(isset($input['hoanthanh'])){
            // xu li xuat hang
            $product = DB::table('products')
            ->select('quantity','id')
            ->get();
            // Xu li trang thai
            $arr = [
                'status'=>4,
            ];
            $order->where('id',$id)->update($arr);
            $order_finish= DB::table('orders')
            ->select('*')
            ->where('status',4)
            ->get();
            return view('backend.content.order.finish',compact('order_finish'));
        }
        if(isset($input['huy'])){
            // Xu li nhap lai san pham
            $product = DB::table('products')
            ->select('quantity','id')
            ->get();
            foreach($input['sanpham'] as $key =>$value){
                $arr_sp[$key]['sanpham'] =  $input['sanpham'][$key];
                $arr_sp[$key]['soluong'] = $input['soluong'][$key];
                $soluong =    (int) $arr_sp[$key]['soluong'];
                $id = (int) $arr_sp[$key]['sanpham'];
                if($soluong >0){
                    foreach($product as $val){
                        if($val->id == $id){
                            $val->quantity +=  $soluong;
                            $products->where('id',$id)->update(['quantity'=>$val->quantity]);           
                        }
                    }
                }
            }
            // Xu li trang thai
            $arr = [
                'status'=>5,
                'receive'=>session('acc')[0]->id,
                'updated_at'=> Carbon\Carbon::now()
            ];
            $order->where('id',$id)->update($arr);
            $order_cancel = DB::table('orders')
            ->select('*')
            ->where('id',$id)
            ->where('receive',session('acc')[0]->id)
            ->where('status',5)
            ->get();
            return view('backend.content.order.huy',compact('order_cancel'));
        }
    }
    
}
