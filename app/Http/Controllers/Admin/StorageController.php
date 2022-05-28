<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Import;
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
        return view('backend.content.storage.import.insert',compact('account','product','info'));
    }
    public function import_insert(Request $request, Product $products)
    {
        $input = $request->all();
        $arr_sp = [];
        $import = new Import;
        $product = DB::table('products')
        ->select('quantity','id')
        ->get();
        foreach($input['product_id'] as $key =>$val){
            $arr_sp[$key]['product_id'] =  $input['product_id'][$key];
            $arr_sp[$key]['soluong'] = $input['soluong'][$key];
            $soluong =    (int) $arr_sp[$key]['soluong'];
            $id = (int) $arr_sp[$key]['product_id'];
            foreach($product as $val){
                if($val->id == $id){
                    $val->quantity +=  $soluong;
                    $products->where('id',$id)->update(['quantity'=>$val->quantity]);           
                }
            }
        }
        $import->ma = $input['ma'];
        // $import->noinhap = $input['noinhap'];
        $import->sanpham = json_encode($arr_sp);
        $import->noidung = $input['noidung'];
        $import->ghichu = $input['ghichu'];
        $import->save();
        return redirect()->route('admin.storage.import');
    }

    public function import_view(Request $request)
    {
        $input = $request->all();
        $sanpham = json_decode($input['sanpham']);
        $product = DB::table('products')
        ->get();
        foreach($sanpham as $key=>$val){
            $id = (int)$val->product_id;
            foreach($product as $k=>$value){
                if($id == $value->id){
                    $arr[$id] = $value; 
                }
            }   
        }
        return response()->json([
            "sanpham"=> $arr,
            "ma"=> $input['ma'],
            "nguoinhap"=>$input['nguoinhap'],
            "id"=>$input['id'],
            "thoigian"=>$input['thoigian'],
            "ghichu"=>$input['ghichu'],
            "noidung"=>$input['noidung'],
            "thoigian"=>$input['thoigian'],
        ]);   
    }

   
}
