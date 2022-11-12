<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cancel;
use App\Models\Storage;
use DB;
use Carbon;
class OrderController extends Controller
{
    public function index(){
        $order = DB::table('orders')
        ->where('status',1)
        ->where('total_price','!=',NULL)
        ->get();
        $order_call = DB::table('orders')
        ->select('*')
        ->where('total_price','!=',NULL)
        ->where('status',2)
        ->get();
        $order_delivery = DB::table('orders')
        ->select('*')
        ->where('total_price','!=',NULL)
        ->where('status',3)
        ->get();
        if(count($order_call) != 0 ){
            foreach($order_call as $val){
                if($val->receive == session('acc')[0]->id){
                    return view('backend.content.order.edit',compact('order_call'));
                }
            }  
        }
        if(count($order_delivery) != 0 ){
            foreach($order_delivery as $value){
                if($value->receive == session('acc')[0]->id){
                    return view('backend.content.order.delivery',compact('order_delivery'));
                }
            }  
        }
        return view('backend.content.order.index',compact('order'));
    }

    public function insert(Request $request, Product $product_capnhat){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $input = $request->all();
        $order = new Order;
        $product = DB::table('products')
        ->select('*')
        ->get();
        $tong_gia_final = 0;
        foreach($input['product_id'] as $key=>$val){
            $arr_tong_gia[$key]['product_id'] =  $input['product_id'][$key];
            $arr_tong_gia[$key]['dongia'] = $input['price'][$key];
            $arr_tong_gia[$key]['soluong'] = $input['quantity'][$key];
        }
        $order->hinhthucthanhtoan = $input['phuongthucthanhtoan'];
        if($input['phuongthucthanhtoan'] == 2){
            if($request->hasfile('anh')){
                $image = $request->file('anh');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('/assets/image/chuyenkhoan/'), $filename);
                $order->anhchuyenkhoan = $filename;
            }
        }else{
            $order->anhchuyenkhoan = NULL;
        }
  
        foreach($input['product_id'] as $key=>$val){
            foreach($product as $value){
                $order->name = $input['name'];
                $order->tel = $input['tel'];
                $order->address = $input['address'];
                $order->note = $input['note'];
                $order->status = 1;
                $order->total_price = $input['price-all'];
                // Don hang online
                $order->loai = 1;
                $order->save();
             
            }
        }
        foreach($arr_tong_gia as $k=> $val_tien)
        {
            $product_chitiet = DB::table('products')
            ->select('quantity')
            ->where('id','=',$val_tien['product_id'])
            ->first();
            $product_chitiet->quantity -= $val_tien['soluong'];
            $order->order_product()->attach($val_tien['product_id'],['quantity'=>$val_tien['soluong']]);
            $arr_final_update[$k] = [
                'quantity'=>$product_chitiet->quantity,
                'id'=> $val_tien['product_id']
            ];
        }
        foreach($arr_final_update as $val_id_pro){
            $product_capnhat->where('id',$val_id_pro['id'])->update($val_id_pro);
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
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id = $input['id'];
        $order_call = Order::find($id);
        if(isset($input['goi'])){
            $arr = [
                'status'=>2,
                'receive'=>session('acc')[0]->id
            ];
            $order->where('id',$id)->update($arr);
            $order_call = DB::table('orders')
            ->select('*')
            ->where('status',2)
            ->get();
            return view('backend.content.order.edit',compact('order_call'));
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
            ->where('status',5)
            ->get();
            return view('backend.content.order.huy',compact('order_cancel'));
        }    
    }
    // public function detail_call($id){
    //     $order = Order::find($id);
    //     // dd($order);
    //     $order_detail= DB::table('order_products')
    //     ->join('products','order_products.product_id','=','products.id')
    //     ->where('order_id','=',$id)
    //     ->where('status','=','2')
    //     ->select('*','order_products.quantity as soluong','order_products.product_id as sanpham')
    //     ->get();

    //     // if($order->receive == session('acc')[0]->id){
    //         return view('backend.content.order.edit',compact('order','order_detail'));
    //     // }
    // }
    public function order_confirm($id){
        $order = Order::find($id);
        $cancel = Cancel::all();
        $order_detail= DB::table('order_products')
        ->join('products','order_products.product_id','=','products.id')
        ->where('order_id','=',$id)
        ->select('*','order_products.quantity as soluong','order_products.product_id as sanpham')
        ->get();
        if($order->receive == session('acc')[0]->id){
            return view('backend.content.order.confirm',compact('order','order_detail','cancel'));
        }
        else{
            echo 'Đã có người giao dịch với đơn này';
        }
    }
// cancel
    public function cancel(){
        $cancel = Cancel::all();
        return view('backend.content.cancel.index',compact('cancel'));
    }
    public function cancel_add(){
        return view('backend.content.cancel.insert');
    }
    public function cancel_insert(Request $request){
        $input= $request->all();
        $cancel = new Cancel;
        $cancel->name = $input['name'];
        $cancel->save(); 
        return redirect()->route('admin.cancel');
    }
    public function cancel_edit($id){
        $cancel= Cancel::find($id);                                    
        return view('backend.content.cancel.edit',compact('cancel'));
    }
    public function cancel_update(Cancel $cancel, Request $request){
        $input = $request->all();
        $id = $input['id'];
        $data =[
            'name'=>$input['name'],
        ];
        $cancel= $cancel->find($id);
        $cancel->update($data);
        return redirect()->route('admin.cancel');
    }
    public function cancel_delete($id,Cancel $cancel){
        $cancel->where('id',$id)->delete();
        return response()->json([
            "success"=>"Bạn đã xóa thành công"            
        ]);
    }
// 
    public function action_response(Request $request, Product $product_capnhat,Storage $storage_update ){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $input= $request->all();
        $id = $input['id'];
        $order_confirm = Order::find($id);
        $product = DB::table('products')
        ->select('*')
        ->get();
        $storage = DB::table('storage')
        ->select('*')
        ->get();
        if($input['luachon'] == 1 && $input['lydo'] == 0){
            foreach($input['sanpham'] as $key=>$val){
                foreach($product as $value){
                    if($value->quantity >= $input['soluong'][$key]){
                        $order_confirm->status = 3;
                        $order_confirm->giovanchuyen = Carbon\Carbon::now();;
                        $order_confirm->save();
                        $order_delivery = DB::table('orders')
                        ->select('*')
                        ->where('id',$id)
                        ->where('status',3)
                        ->get();
                        return view('backend.content.order.delivery',compact('order_delivery'));
                    }
                }
            }
        }else{
            $arr = [];
            foreach($input['sanpham'] as $key=>$val){
                // foreach($storage as $k => $value){
                //     if($value->quantity >= $input['soluong'][$key]){
                        $arr[$key]['product'] = $input['sanpham'][$key];
                        $arr[$key]['quantity'] = $input['soluong'][$key];

                        $order_confirm->status = 5;
                        $order_confirm->updated_at = Carbon\Carbon::now();
                        $order_confirm->lydohuy = $input['lydo'];
                        $order_confirm->save();
                        $order_cancel = DB::table('orders')
                        ->select('*')
                        ->where('status',5)
                        ->get();
                       
                //     }
                // }
            }
            foreach($arr as $k_fl => $valp){
                $kho = DB::table('storage')->select('quantity')->where('product','=',$valp['product'])->first();
                if(!empty($kho)){
                    $capnhat_kho = (int) $kho->quantity + (int) $valp['quantity'] ;
                    $arr_final[$k_fl] = [
                        'product'=> $valp['product'],
                        'quantity'=> $capnhat_kho ];        
                } 
                           
            }  
            // dd($arr_final);
            foreach($arr_final as $keyrlt=> $result){
                $arr_final_update[$keyrlt] = [
                    'quantity' => $result['quantity']
                ];
            }
            foreach($arr_final as $keyrlt=> $result){
                $storage_update->where('product','=',$result['product'])->update($arr_final_update[$keyrlt]);
            }
            return view('backend.content.order.huy',compact('order_cancel'));
        }
    }

    public function order_delivery(){
        $order_delivery = DB::table('orders')
        ->select('*')
        ->where('status',3)
        ->get();
        foreach($order_delivery as $val){
            if($val->receive == session('acc')[0]->id){
                return view('backend.content.order.delivery',compact('order_delivery'));
            }
            else{
                echo 'Đã có người giao dịch với đơn này';
            }
        }
    }

    public function order_final($id){
        $order = Order::find($id);
        $cancel = Cancel::all();
        $order_detail= DB::table('order_products')
        ->join('products','order_products.product_id','=','products.id')
        ->where('order_id','=',$id)
        ->select('*','order_products.quantity as soluong','order_products.product_id as sanpham')
        ->get();
        if($order->receive == session('acc')[0]->id){
            return view('backend.content.order.final',compact('order','order_detail','cancel'));
        }
        else{
            echo 'Đã có người giao dịch với đơn này';
        }
    }

    public function order_closing(Request $request, Product $product_capnhat){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $input= $request->all();
        $id = $input['id'];
        $order_finish = Order::find($id);
        $product = DB::table('products')
        ->select('quantity','id')
        ->get();
        if($input['luachon'] == 1 && $input['lydo'] == 0){
            foreach($input['sanpham'] as $key=>$val){
                foreach($product as $value){
                    if($value->quantity >= $input['soluong'][$key]){
                        $order_finish->status = 4;
                        $order_finish->giohoanthanh = Carbon\Carbon::now();
                        $order_finish->save();
                        $order_finish = DB::table('orders')
                        ->select('*')
                        ->where('status',4)
                        ->get();
                        return view('backend.content.order.finish',compact('order_finish'));
                    }
                }
            }
        }else{
            foreach($input['sanpham'] as $key=>$val){
                foreach($product as $value){
                    if($value->quantity >= $input['soluong'][$key]){
                        $order_finish->status = 5;
                        $order_finish->updated_at = Carbon\Carbon::now();
                        $order_finish->lydohuy = $input['lydo'];
                        $order_finish->save();
                        if($value->id == $input['sanpham'][$key] ){
                            $value->quantity += $input['soluong'][$key];
                            $arr = [
                                'quantity'=>$value->quantity,
                            ];
                            $product_capnhat->where('id',$input['sanpham'][$key])->update($arr);
                            $order_cancel = DB::table('orders')
                            ->select('*')
                            ->where('status',5)
                            ->get();
                            return view('backend.content.order.huy',compact('order_cancel'));

                        }
                    }
                }
            }
        }
    }



    public function order_cancel(){
        // $order_detail= DB::table('order_products')
        // ->join('products','order_products.product_id','=','products.id')
        // ->where('order_id','=',$id)
        // ->select('*','order_products.quantity as soluong','order_products.product_id as sanpham')
        // ->get();
        $order_cancel= DB::table('orders')
        ->where('status','=',5)
        ->get();
        return view('backend.content.order.huy',compact('order_cancel'));

    }
    public function order_finish(){
        $order_finish= DB::table('orders')
        ->where('status','=',4)
        ->get();
        return view('backend.content.order.finish',compact('order_finish'));

    }
    
}
