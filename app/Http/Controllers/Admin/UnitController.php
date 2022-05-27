<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
class UnitController extends Controller
{
    public function index(){
        $unit = Unit::all();
        return view('backend.content.unit.index',compact('unit'));
    }
    public function add(){
        return view('backend.content.unit.insert');
    }
    public function insert(Request $request){
        
        $input= $request->all();
        $unit = new Unit;
        $unit->name = $input['name'];
        $unit->ma = $input['ma'];
        $unit->save(); 
        return redirect()->route('admin.unit');
    }
    public function edit($id){
        $unit = Unit::find($id);                                    
        return view('backend.content.unit.edit',compact('unit'));
    }
    public function update(Unit $unit,Request $request){
        $input = $request->all();
        $id = $input['id'];
        $data =[
            'ma'=> $input['ma'],
            'name'=>$input['name'],
        ];
        $units = $unit->find($id);
        $units->update($data);
        return redirect()->route('admin.unit');
    }
    public function delete($id, Unit $unit){
            $unit->where('id',$id)->delete();
            return response()->json([
                "success"=>"Bạn đã xóa thành công"            
            ]);
    }
}
