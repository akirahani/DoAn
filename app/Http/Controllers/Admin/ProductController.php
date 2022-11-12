<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Trademark;
use App\Models\Unit;
use DB;
class ProductController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $product = Product::all();
        $category = DB::table('products')
        ->select('categories.*')
        ->join('categories','categories.id','=','products.category_id')
        ->get();
        $trademark = DB::table('products')
        ->select('trademarks.*')
        ->join('trademarks','trademarks.id','=','products.trademark_id')
        ->get();
        foreach($product as $key=>$val){
            foreach($category as $k=> $value){
                if($val->category_id == $value->id)
                $val->category_id = $value->name ;
            }
            foreach($trademark as $k=>$vals){
                if($val->trademark_id == $vals->id)
                $val->trademark_id = $vals->name ;
            }
        }
        return view('backend.content.product.index',compact('product','admin','category','trademark'));
    }
    public function insert()
    {
        $admin = Auth::guard('admin')->user();
        $product = Product::all();
        $category = Category::all();
        $trademark = Trademark::all();
        $unit = Unit::all();
        return view('backend.content.product.insert',compact('category','product','trademark','unit'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $admin = Auth::guard('admin')->user();
        $product = new Product();
        $input = $request->all();
        $product->name = $input['name'];
        $product->category_id = $input['category_id'];
        $product->trademark_id = $input['trademark_id'];
        $product->quantity = $input['quantity'];
        $product->price = $input['price'];
        $product->price_sale = $input['price_sale'];
        $product->status = $input['status'];
        $product->description = $input['description'];
        $product->ingredient = $input['ingredient'];
        $product->color = $input['color'];
        $product->face_paint = $input['face_paint'];
        $product->solid_content = $input['solid_content'];
        $product->proportion = $input['proportion'];
        $product->wet_paint_film = $input['wet_paint_film'];
        $product->dry_paint_film = $input['dry_paint_film'];
        $product->dry_time = $input['dry_time'];
        $product->complete_dry = $input['complete_dry'];
        $product->surface_dry = $input['surface_dry'];
        $product->theoretical_attrition = $input['theoretical_attrition'];
        $product->paint_next_layer = $input['paint_next_layer'];
        $product->tool = $input['tool'];
        $product->solvent = $input['solvent'];
        $product->tutorial = $input['tutorial'];
        $product->unit_id = $input['unit_id'];
        if($request->hasfile('image')){
            $image = $request ->file('image');
            $product->image = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/assets/image/upload'),$product->image);
        };
        $product->save();
        return redirect()->route('admin.product');
    }
    public function update(Request $request, Product $product)
    {
        $admin = Auth::guard('admin')->user();
        $input = $request->all();
        $id = $input['id'];
        $arr = array(
            'name'=>$input['name'],
            'category_id' => $input['category_id'],
            'trademark_id' => $input['trademark_id'],
            'quantity' => $input['quantity'],
            'price' => $input['price'],
            'price_sale' => $input['price_sale'],
            'status' => $input['status'],
            'description' => $input['description'],
            'ingredient' => $input['ingredient'],
            'color' => $input['color'],
            'face_paint' => $input['face_paint'],
            'solid_content' => $input['solid_content'],
            'proportion' => $input['proportion'],
            'wet_paint_film' => $input['wet_paint_film'],
            'dry_paint_film' => $input['dry_paint_film'],
            'dry_time' => $input['dry_time'],
            'complete_dry' => $input['complete_dry'],
            'surface_dry' => $input['surface_dry'],
            'theoretical_attrition' => $input['theoretical_attrition'],
            'paint_next_layer' => $input['paint_next_layer'],
            'tool' => $input['tool'],
            'solvent' => $input['solvent'],
            'tutorial' => $input['tutorial'],
            'unit_id' => $input['unit_id']
        );
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_url = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/assets/image/upload'), $image_url);
            $arr['image'] = $image_url;
        }
        $product->where('id',$id)->update($arr);
        return redirect()->route('admin.product');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $category = DB::table('products')
        ->select('*','categories.name as name')
        ->join('categories','categories.id','=','products.category_id')
        ->get();
        $trademark = DB::table('products')
        ->select('*','trademarks.name as name')
        ->join('trademarks','trademarks.id','=','products.category_id')
        ->get();
        $unit = Unit::all();
        $cate = Category::all();
        $trade = Trademark::all();
        return view('backend.content.product.edit', compact('product','category','trademark','cate','trade','unit'));
    }

    public function delete($id,Product $product)
    {
        $product->where('id',$id)->delete();
        return response()->json([
            "success"=>"Bạn xóa thành công"
        ]);
    }
}
