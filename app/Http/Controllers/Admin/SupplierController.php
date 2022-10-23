<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Trademark;
use Illuminate\Support\Facades\Auth;
use DB;
class SupplierController extends Controller
{

    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $supplier = Supplier::all();
        $trademark = DB::table('trademarks')
        ->select('trademarks.*')
        ->get();
        $arr_ten_thuong_hieu = [];
        foreach($trademark as $val){
            $arr_ten_thuong_hieu[$val->id] = $val->name;
        }
        return view('backend.content.supplier.index',compact('supplier','admin','trademark','arr_ten_thuong_hieu'));
    }
    public function add()
    {
        $admin = Auth::guard('admin')->user();
        $trademark = Trademark::all();
        return view('backend.content.Supplier.insert',compact('admin','trademark') );
    }
    public function insert(Request $request)
    {   
       
        $admin = Auth::guard('admin')->user();
        $supplier = new Supplier();
        $input = $request->all();
        $supplier->ten = $input['ten'];
        $supplier->thuonghieu = $input['thuonghieu'];
        $supplier->diachi = $input['diachi'];
        $supplier->save();
        return redirect()->route('admin.supplier');
    }
    public function update(Request $request, Supplier $Supplier)
    {
        $admin = Auth::guard('admin')->user();
        $input = $request->all();
        $id = $input['id'];
        $arr = array(
            'ten'=>$input['ten'],
            'thuonghieu' => $input['thuonghieu'],
            'diachi' => $input['diachi'],
        );
      
        $Supplier->where('id',$id)->update($arr);
        return redirect()->route('admin.supplier');
    }
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        $trademark = Trademark::all();
        return view('backend.content.supplier.edit', compact('supplier','trademark'));
    }

    public function delete($id,Supplier $supplier)
    {
        $supplier->where('id',$id)->delete();
        return response()->json([
            "success"=>"Bạn xóa thành công"
        ]);
    }
}
