<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Order;
class SellController extends Controller
{
    public function index(){
        $order = DB::table('orders')->where('loai','=',2)->get();
        return view('backend.content.sell.index',compact('order'));
    }
    public function add(){
        $product = DB::table('products')->get();
        return view('backend.content.sell.insert',compact('product'));
    }
    public function detail($id){
        $order_detail = DB::table('orders')->where('id',$id)->first();
        $product_order = DB::table('order_products')->select('product_id','quantity')->where('order_id',$order_detail->id)->get();
        return view('backend.content.sell.detail',compact('order_detail','product_order'));
    }
    // public function insert(Request $request, Product $product_capnhat){
    //     date_default_timezone_set('Asia/Ho_Chi_Minh');
    //     $input = $request->all();
    //     $order = new Order;
    //     $product = DB::table('products')
    //     ->select('*')
    //     ->get();
    //     foreach($input['product_id'] as $key=>$val){
    //         foreach($product as $value){
    //             if($value->quantity >= $input['quantity'][$key]){
    //                 $order->name = $input['name'];
    //                 $order->tel = $input['tel'];
    //                 $order->address = $input['address'];
    //                 $order->note = $input['note'];
    //                 $order->status = 1;
    //                 $order->total_price = $input['price-all'];
    //                 $order->hinhthucthanhtoan = $input['phuongthucthanhtoan'];
    //                 if($input['phuongthucthanhtoan'] == 2){
    //                     $order->nganhang = $input['nganhang'];
    //                     $order->sotaikhoan = $input['sotaikhoan'];
    //                 }else{
    //                     $order->nganhang = NULL;
    //                     $order->sotaikhoan = NULL;
    //                 }
    //                 $order->save();
    //                 if($value->id == $input['product_id'][$key] ){
    //                     $value->quantity -= $input['quantity'][$key];
    //                     $order->order_product()->attach($input['product_id'][$key],['quantity'=>$input['quantity'][$key]]);
    //                     $arr = [
    //                         'quantity'=>$value->quantity
    //                     ];
    //                     $product_capnhat->where('id',$input['product_id'][$key])->update($arr);
    //                 }
    //             }
    //             // else{
    //             //     return redirect()->back();
    //             // }
    //         }
    //     }
    //     $request->Session()->forget('cart');  
    //     return redirect()->route('cart')->with('success', 'Chúng tôi sẽ liên lạc sớm nhất');
    // }  
    // public function import_insert(Request $request, Product $products, Storage $store)
    // {
    //     $tongnhap = 0;
    //     $arr_gia_sp = [];
    //     // dd($input['product_id']);
    //     foreach($input['product_id'] as $key =>$val){
    //         $arr_sp[$key]['product'] =  $input['product_id'][$key];
    //         $arr_sp_id[$key]['product'] =  $input['product_id'][$key];
    //         $arr_sp[$key]['quantity'] = $input['soluong'][$key];
    //         $arr_sp[$key]['supplier'] = $input['nhacungcap'];
    //         $arr_sp[$key]['price'] = $input['gianhap'][$key];
    //         $arr_sp[$key]['unit'] = $input['unit_id'][$key];
    //         $arr_sp[$key]['created_at'] = date('Y-m-d H:i:s') ;
    //         $arr_sp[$key]['updated_at'] =date('Y-m-d H:i:s');
    //         $id = (int) $arr_sp[$key]['product'];

    //         $arr_sp1[$key]['product'] =  $input['product_id'][$key];
    //         $arr_sp1[$key]['quantity'] = $input['soluong'][$key];
    //         $arr_sp1[$key]['supplier'] = $input['nhacungcap'];
    //         $arr_sp1[$key]['price'] = $input['gianhap'][$key];
    //         $arr_sp1[$key]['unit'] = $input['unit_id'][$key];
            
    //     }
        
    //     $arr_process = [];
    //     foreach($arr_sp_id as $k_spc => $val_sp_check){
    //         foreach($val_sp_check as $val_continue){
    //             array_push($arr_process,$val_continue);
    //         }
    //     }
    //     // tong nhap cuar phieu nhap
    //     foreach($arr_sp as $val_tien)
    //     {
    //         $tongnhap += $val_tien['quantity'] * $val_tien['price'];
    //     }
      
    //     $check_storage = [];
    //     foreach($arr_process as $key=> $val){
    //         $count_arr = array_count_values($arr_process);
    //         foreach($count_arr as $key =>$vals){
    //             // Neu trung san pham thi khong them
    //             if($vals > 1){
    //                return redirect()->back();
    //             }else{
                    
    //                 foreach($input['product_id'] as $key_product =>$val){
    //                     $check_storage[$key_product] = DB::table('storage')->select('product','quantity')->where('product','=',$val)->first();
    //                     if($check_storage[$key_product] != null){
    //                         $soluong_capnhap =  $check_storage[$key_product]->quantity +  $arr_sp[$key_product]['quantity'];
    //                         $arr_update_nhap = [
    //                             'quantity' => $soluong_capnhap,
    //                             'price' => $arr_sp1[$key_product]['price']
    //                         ];
    //                         $update_data = DB::table('storage')->where('product','=',$check_storage[$key_product]->product)->update($arr_update_nhap);
    //                     }else{
    //                         $insert_data =  DB::table('storage')->insert($arr_sp);
    //                     }
    //                 }

    //                 // them san pham vao kho va phieu nhap khi khong bi trung
    //                 $import->nhacungcap = $input['nhacungcap'];
    //                 $import->ma = $input['ma'];
    //                 $import->nguoinhap = $input['nguoinhap'];
    //                 $import->sanpham = json_encode($arr_sp1);
    //                 $import->noidung = $input['noidung'];
    //                 $import->ghichu = $input['ghichu'];
    //                 $import->tongthu = $tongnhap;
    //                 $import->conlai = $tongnhap;
    //                 $import->save();
    //                 return redirect()->route('admin.storage.import');
                    
    //             }
    //         }
    //     }
        
    // }

    public function insert_order_offline(Request $request, Product $product_capnhat){
     
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $input = $request->all();
        $order = new Order;
        $product = DB::table('products')
        ->select('*')
        ->get();
        $arr_tong_gia = [];
        $tong_gia_final = 0;

        foreach($input['product_id'] as $key=>$val){
            $arr_tong_gia[$key]['product_id'] =  $input['product_id'][$key];
            $arr_tong_gia[$key]['dongia'] = $input['dongia'][$key];
            $arr_tong_gia[$key]['soluong'] = $input['soluong'][$key];
        }
        foreach($arr_tong_gia as $val_tien)
        {
            $tong_gia_final += $val_tien['dongia'] * $val_tien['soluong'];
        }
        $order->total_price = $tong_gia_final;

        foreach($input['product_id'] as $key=>$val){
            foreach($product as $value){
               
                if($value->quantity >= $input['soluong'][$key]){
                    $order->name = $input['ten'];
                    $order->tel = $input['dienthoai'];
                    $khach_hang = DB::table('users')->where('phone','=',$input['dienthoai'])->first();
            
                    if(!empty($khach_hang)){
                        $order->khach = $khach_hang->id; 
                    }else{
                        $arr_them_khach = [
                            'name'=>$input['ten'],
                            'phone'=>$input['dienthoai'],
                            'username'=>$input['dienthoai'],
                            'password'=>bcrypt($input['dienthoai']),
                        ];
                        $them_moi_khach = DB::table('users')->insert($arr_them_khach);
                        $order->khach = $them_moi_khach; 
                    }
                    $order->status = 4;                    
                    // Don hang offline
                    $order->loai = 2;   
                    $order->save();
                    foreach($arr_tong_gia as $k=> $val_tien)
                    {
                        $product_chitiet = DB::table('products')
                        ->select('quantity')
                        ->where('id','=',$val_tien['product_id'])
                        ->first();
                        $product_chitiet->quantity -= $val_tien['soluong'];
                        $order->order_product()->attach($val_tien['product_id'],['quantity'=>$val_tien['soluong'],['price'=> $val_tien['dongia'] ]]);
                        $arr_final_update[$k] = [
                            'quantity'=>$product_chitiet->quantity,
                            'id'=> $val_tien['product_id']
                        ];
                    }

                    foreach($arr_final_update as $val_id_pro){
                        $product_capnhat->where('id',$val_id_pro['id'])->update($val_id_pro);
                    }
                    
                    return redirect()->route('sell.index');
                }
                
                else{
                    return redirect()->back();
                }
                
            }
            
        }

        
        
    
       
    }  
}
