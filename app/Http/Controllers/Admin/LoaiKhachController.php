<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiKhach;
class LoaiKhachController extends Controller
{
    public function index(){
        $loai = LoaiKhach::all();
        return view('backend.content.loaikhach.index',compact('loai'));
    }
    public function add(){
        return view('backend.content.loaikhach.insert');
    }
    public function insert(Request $request){
        
        $input= $request->all();

        $loai = new LoaiKhach;
        $loai->ten = $input['ten'];
        $loai->tien = $input['tien'];
        $loai->giam = $input['giam'];
        $loai->save();   
        return redirect()->route('loai.index');
    }
    public function edit($id){
        $loai = LoaiKhach::find($id);                                   
        return view('backend.content.loaikhach.edit',compact('loai'));
    }
    public function update(LoaiKhach $loai,Request $request){
        $input = $request->all();
        $id = $input['id'];
        $data =[
            'ten'=> $input['ten'],
            'tien'=>$input['tien'],
            'giam'=>$input['giam'],
        ];
        $loais = $loai->find($id);
        $loais->update($data);
        return redirect()->route('loai.index');
    }
    public function delete($id, LoaiKhach $loai){
            $loai->where('id',$id)->delete();
            return response()->json([
                "success"=>"Bạn đã xóa thành công"            
            ]);
    }
}
