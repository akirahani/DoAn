<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Import;
use App\Models\Export;
use App\Models\Unit;
use App\Models\Supplier;
use App\Models\ThongKeChi;
use DB;
class StorageController extends Controller
{
    public function import()
    {
        $import = Import::all();
        return view('backend.content.storage.import.index',compact('import'));
    }

    public function import_add()
    {
        $account = Admin::all();
        $product = Product::all();
        $info = json_encode($product);
        $suppliers = Supplier::all();
        $trademark = DB::table('trademarks')
        ->select('trademarks.*')
        ->get();
        $arr_ten_thuong_hieu = [];
        foreach($trademark as $val){
            $arr_ten_thuong_hieu[$val->id] = $val->name;
        }
        return view('backend.content.storage.import.insert',compact('account','product','info','suppliers','arr_ten_thuong_hieu'));
    }
    public function import_insert(Request $request, Product $products)
    {
        $input = $request->all();
        $arr_sp = [];
        $import = new Import;
        $product = DB::table('products')
        ->select('quantity','id','price')
        ->get();
        $tongnhap = 0;
        $arr_gia_sp = [];
        foreach($input['product_id'] as $key =>$val){
            $arr_sp[$key]['product_id'] =  $input['product_id'][$key];
            $arr_sp[$key]['soluong'] = $input['soluong'][$key];
            $arr_sp[$key]['supplier'] = $input['supplier'][$key];
            $soluong =    (int) $arr_sp[$key]['soluong'];
            $id = (int) $arr_sp[$key]['product_id'];
            if($soluong >0){
                foreach($product as $val){
                    if($val->id == $id){
                        $val->quantity +=  $soluong;
                        $products->where('id',$id)->update(['quantity'=>$val->quantity]);           
                    }
                    $arr_gia_sp[$val->id] = $val->price;
                    
                }
                $tongnhap += (int) $arr_sp[$key]['soluong'] * (int) $arr_gia_sp[$input['product_id'][$key]];
            }
            else{
                $soluong = 0;
                $mess=  'Số lượng phải lớn hơn 0';
                echo "<script type='text/javascript'>alert('$mess');</script>";
                return redirect()->route('admin.storage.import.add');
            }
        }
        $import->nhacungcap = $input['supplier'][0];
        $import->ma = $input['ma'];
        $import->nguoinhap = $input['nguoinhap'];
        $import->sanpham = json_encode($arr_sp);
        $import->noidung = $input['noidung'];
        $import->ghichu = $input['ghichu'];
        $import->tongthu = $tongnhap;
        $import->conlai = $tongnhap;
        $import->save();
        return redirect()->route('admin.storage.import');
    }

    public function import_view(Request $request)
    {
        $input = $request->all();
        $account = Admin::all();
        $unit = Unit::all();
        $sanpham = json_decode($input['sanpham']);
        $product = DB::table('products')
        ->get();
        foreach($sanpham as $key=>$val){
            $id = (int)$val->product_id;
            foreach($product as $k=>$value){
                if($id == $value->id ){
                    $arr[$key] = $value; 
                    $arr[$key]->soluongnhap  = $sanpham[$key]->soluong;
                }
                foreach($unit as $val){
                    if($value->unit_id == $val->id){
                        $value->unit_id = $val->name;
                    }
                }
            }   
        }
        foreach($account as $val){
            if($input['nguoinhap'] == $val->id){
                $input['nguoinhap'] = $val->name;
            }
        }
        return response()->json([
            "sanpham"=> json_encode($arr),
            "ma"=> $input['ma'],
            "nguoinhap"=>$input['nguoinhap'],
            "id"=>$input['id'],
            "thoigian"=>$input['thoigian'],
            "ghichu"=>$input['ghichu'],
            "noidung"=>$input['noidung'],
            "thoigian"=> $input['thoigian'],
        ]);   
    }

    public function import_chi(Request $request)
    {
        $input = $request->all();
        $account = Admin::all();
        $unit = Unit::all();
        
        $sanpham_xuli = DB::table('imports')->select('sanpham','conlai')->where('id','=',$input['id'])->first(); 
        $sanpham = json_decode($sanpham_xuli->sanpham);
        $product = DB::table('products')
        ->get();
        foreach($sanpham as $key=>$val){
            $id = (int)$val->product_id;
            foreach($product as $k=>$value){
                if($id == $value->id ){
                    $arr[$key] = $value; 
                    $arr[$key]->soluongnhap  = $sanpham[$key]->soluong;
                }
                foreach($unit as $val){
                    if($value->unit_id == $val->id){
                        $value->unit_id = $val->name;
                    }
                }
            }   
        }
        return response()->json([
            "conlai"=> $sanpham_xuli->conlai,
            "sanpham"=> json_encode($arr),
            "ma"=> $input['ma'],
            "id"=>$input['id'],
            "nhacungcap"=>$input['nhacungcap'],
        ]);   
    }
    public function save_chi(Import $import, Request $request){
        $input = $request->all();
        $thongkechi = new ThongKeChi();
        $thongkechi->nhacungcap = $input['ncc'];
        $thongkechi->tienchi = $input['sotienchi'];
        $thongkechi->ngaychi = date('Y-m-d');
        $thongkechi->phieunhap = $input['phieunhap'];
        $tenphieunhap = DB::table('imports')->select('ma','conlai')->where('id','=',$input['phieunhap'])->first();
        if( $input['tongnhap'] >= $input['sotienchi']){
            $thongkechi->thieu = (int)$tenphieunhap->conlai - (int)$input['sotienchi'];
            $arr['conlai'] = (int)$tenphieunhap->conlai - (int)$input['sotienchi'];
            $capnhat = $import->where('id',$input['phieunhap'])->update($arr);
        }
        else{
            $thongkechi->thua = (int)$input['sotienchi'] - (int)$input['tongnhap'] ;
        }

        $thongkechi->save();
        return response()->json([
            "conlai"=>  (int)$input['tongnhap'] - (int)$input['sotienchi'],
            "ma"=> $tenphieunhap->ma,
            "id"=>$input['phieunhap'],
        ]);   
    }
    // export
    public function export()
    {
        $export = Export::all();
        return view('backend.content.storage.export.index',compact('export'));
    }

    public function export_add()
    {
        $account = Admin::all();
        $product = Product::all();
        $info = json_encode($product);
        return view('backend.content.storage.export.insert',compact('account','product','info'));
    }
    public function export_insert(Request $request, Product $products)
    {
        $input = $request->all();
        $arr_sp = [];
        $export = new Export;
        $product = DB::table('products')
        ->select('quantity','id')
        ->get();
        foreach($input['product_id'] as $key =>$val){
            $arr_sp[$key]['product_id'] =  $input['product_id'][$key];
            $arr_sp[$key]['soluong'] = $input['soluong'][$key];
            $soluong =    (int) $arr_sp[$key]['soluong'];
            $id = (int) $arr_sp[$key]['product_id'];   
            foreach($product as $keys=>$value){
                if($soluong >0 && $soluong <= $value->quantity  ){
                    if($value->id == $id ){
                        $value->quantity -=  $soluong;
                        $products->where('id',$id)->update(['quantity'=>$value->quantity]);
                    }
                }
                else{
                    $soluong = 0;
                    // $value->quantity = $value->quantity;
                    // echo "<script type='text/javascript'>alert('$mess');</script>";
                    return redirect()->route('admin.storage.export.add');
                }
            }
        }
        $export->ma = $input['ma'];
        $export->nguoixuat = $input['nguoixuat'];
        $export->sanpham = json_encode($arr_sp);
        $export->noidung = $input['noidung'];
        $export->ghichu = $input['ghichu'];
        $export->save();
        return redirect()->route('admin.storage.export');
    }

    public function export_view(Request $request)
    {
        $input = $request->all();
        $account = Admin::all();
        $unit = Unit::all();
        $sanpham = json_decode($input['sanpham']);
        $product = DB::table('products')
        ->get();
        foreach($sanpham as $key=>$val){
            $id = (int)$val->product_id;
            foreach($product as $k=>$value){
                if($id == $value->id ){
                    $arr[$key] = $value; 
                    $arr[$key]->soluongxuat = $sanpham[$key]->soluong;
                }
                foreach($unit as $val){
                    if($value->unit_id == $val->id){
                        $value->unit_id = $val->name;
                    }
                }
            }   
        }
        foreach($account as $val){
            if($input['nguoixuat'] == $val->id){
                $input['nguoixuat'] = $val->name;
            }
        }
        return response()->json([
            "sanpham"=> json_encode($arr),
            "ma"=> $input['ma'],
            "nguoixuat"=>$input['nguoixuat'],
            "id"=>$input['id'],
            "thoigian"=>$input['thoigian'],
            "ghichu"=>$input['ghichu'],
            "noidung"=>$input['noidung'],
            "thoigian"=> $input['thoigian'],
        ]);   
    }

   
}
