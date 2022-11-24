<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cancel;
use App\Models\Storage;
use App\Models\Color;
use DB;
use Carbon;
class PaintColorController extends Controller
{
    public function index(){
        $paint = Color::paginate(5);
        return view('backend.content.paint.index',compact('paint'));
    }
    public function add(){
        $product = Product::all();
        return view('backend.content.paint.insert',compact('product'));
    }
    public function insert(Request $request){
        $paint = new Color();
        $input = $request->all();
        $name = $input['name'];
        $ma = $input['ma'];
        $arr_sp= [];
        foreach($input['product'] as $key=> $val){
            $arr_sp[$key] = $val;
        }
        $arr = [
            'name'=>$name,
            'product' =>json_encode($arr_sp),
            'ma'=>$ma
        ];
        $paint->insert($arr);
        return redirect()->route('paint.index');
     
    }

    public function edit($id){
        $product = Product::all();
        $paint = Color::find($id);
        return view('backend.content.paint.edit',compact('paint','product'));
    }  
    public function update(Request $request, Color $paint){
        $input = $request->all();
        $id =$request['id'];
        $input = $request->all();
        $name = $input['name'];
        $ma = $input['ma'];
        $arr_sp = [];
        foreach($input['product'] as $key=> $val){
            $arr_sp[$key] = $val;
        }
        $arr = [
            'name'=>$name,
            'product' =>json_encode($arr_sp),
            'ma'=>$ma
        ];
        $paint->where('id',$id)->update($arr);
        return redirect()->route('paint.index');
    }

    public function delete($id,Color $paint){
        $paint->where('id',$id)->delete();    
        return response()->json([
            "success"=>"Bạn đã xóa thành công"
        ]);
    }
    public function color_product(Request $request){
        $input = $request->all();
        $arr_sp = [];
        $arr_get_sp = json_decode($input['product']);
        if(!empty($arr_get_sp)){
            foreach($arr_get_sp as $key=> $val){
                $arr_sp[$key] = DB::table('products')->select('id','name','image')->where('id','=',$val)->first();
            }
            $arr_final_sp = json_encode($arr_sp);
        }else{
            $arr_final_sp = '';
        }
        
        echo json_encode([
            'sanpham'=>$arr_final_sp
            ] 
        );
    }
}
