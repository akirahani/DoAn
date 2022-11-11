<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function index(){
        return view('backend.content.sell.index');
    }
    public function insert(Request $request, Product $product_capnhat){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $input = $request->all();
        $order = new Order;
        $product = DB::table('products')
        ->select('*')
        ->get();
        foreach($input['product_id'] as $key=>$val){
            foreach($product as $value){
                if($value->quantity >= $input['quantity'][$key]){
                    $order->name = $input['name'];
                    $order->tel = $input['tel'];
                    $order->address = $input['address'];
                    $order->note = $input['note'];
                    $order->status = 1;
                    $order->total_price = $input['price-all'];
                    $order->hinhthucthanhtoan = $input['phuongthucthanhtoan'];
                    if($input['phuongthucthanhtoan'] == 2){
                        $order->nganhang = $input['nganhang'];
                        $order->sotaikhoan = $input['sotaikhoan'];
                    }else{
                        $order->nganhang = NULL;
                        $order->sotaikhoan = NULL;
                    }
                    $order->save();
                    if($value->id == $input['product_id'][$key] ){
                        $value->quantity -= $input['quantity'][$key];
                        $order->order_product()->attach($input['product_id'][$key],['quantity'=>$input['quantity'][$key]]);
                        $arr = [
                            'quantity'=>$value->quantity
                        ];
                        $product_capnhat->where('id',$input['product_id'][$key])->update($arr);
                    }
                }
                // else{
                //     return redirect()->back();
                // }
            }
        }
        $request->Session()->forget('cart');  
        return redirect()->route('cart')->with('success', 'Chúng tôi sẽ liên lạc sớm nhất');
    }  
    public function import_insert(Request $request, Product $products, Storage $store)
    {
        $tongnhap = 0;
        $arr_gia_sp = [];
        // dd($input['product_id']);
        foreach($input['product_id'] as $key =>$val){
            $arr_sp[$key]['product'] =  $input['product_id'][$key];
            $arr_sp_id[$key]['product'] =  $input['product_id'][$key];
            $arr_sp[$key]['quantity'] = $input['soluong'][$key];
            $arr_sp[$key]['supplier'] = $input['nhacungcap'];
            $arr_sp[$key]['price'] = $input['gianhap'][$key];
            $arr_sp[$key]['unit'] = $input['unit_id'][$key];
            $arr_sp[$key]['created_at'] = date('Y-m-d H:i:s') ;
            $arr_sp[$key]['updated_at'] =date('Y-m-d H:i:s');
            $id = (int) $arr_sp[$key]['product'];

            $arr_sp1[$key]['product'] =  $input['product_id'][$key];
            $arr_sp1[$key]['quantity'] = $input['soluong'][$key];
            $arr_sp1[$key]['supplier'] = $input['nhacungcap'];
            $arr_sp1[$key]['price'] = $input['gianhap'][$key];
            $arr_sp1[$key]['unit'] = $input['unit_id'][$key];
            
        }
        
        $arr_process = [];
        foreach($arr_sp_id as $k_spc => $val_sp_check){
            foreach($val_sp_check as $val_continue){
                array_push($arr_process,$val_continue);
            }
        }
        // tong nhap cuar phieu nhap
        foreach($arr_sp as $val_tien)
        {
            $tongnhap += $val_tien['quantity'] * $val_tien['price'];
        }
      
        $check_storage = [];
        foreach($arr_process as $key=> $val){
            $count_arr = array_count_values($arr_process);
            foreach($count_arr as $key =>$vals){
                // Neu trung san pham thi khong them
                if($vals > 1){
                   return redirect()->back();
                }else{
                    
                    foreach($input['product_id'] as $key_product =>$val){
                        $check_storage[$key_product] = DB::table('storage')->select('product','quantity')->where('product','=',$val)->first();
                        if($check_storage[$key_product] != null){
                            $soluong_capnhap =  $check_storage[$key_product]->quantity +  $arr_sp[$key_product]['quantity'];
                            $arr_update_nhap = [
                                'quantity' => $soluong_capnhap,
                                'price' => $arr_sp1[$key_product]['price']
                            ];
                            $update_data = DB::table('storage')->where('product','=',$check_storage[$key_product]->product)->update($arr_update_nhap);
                        }else{
                            $insert_data =  DB::table('storage')->insert($arr_sp);
                        }
                    }

                    // them san pham vao kho va phieu nhap khi khong bi trung
                    $import->nhacungcap = $input['nhacungcap'];
                    $import->ma = $input['ma'];
                    $import->nguoinhap = $input['nguoinhap'];
                    $import->sanpham = json_encode($arr_sp1);
                    $import->noidung = $input['noidung'];
                    $import->ghichu = $input['ghichu'];
                    $import->tongthu = $tongnhap;
                    $import->conlai = $tongnhap;
                    $import->save();
                    return redirect()->route('admin.storage.import');
                    
                }
            }
        }
        
    }
}
