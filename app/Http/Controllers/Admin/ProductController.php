<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Trademark;
use DB;
class ProductController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $product = Product::all();
        $category = DB::table('products')
        ->select('*','categories.name as name')
        ->join('categories','categories.id','=','products.category_id')
        ->get();
        $trademark = DB::table('products')
        ->select('*','trademarks.name as name')
        ->join('trademarks','trademarks.id','=','products.category_id')
        ->get();
        return view('backend.content.product.index',compact('product','admin','category','trademark'));
    }
    public function insert()
    {
        $admin = Auth::guard('admin')->user();
        $product = Product::all();
        $category = Category::all();
        $trademark = Trademark::all();
        return view('backend.content.product.insert',compact('category','product','trademark'));
    }
    public function store(Request $request)
    {
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
        if($request->hasfile('image')){
            $image = $request ->file('image');
            $product->image = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/assets/image/upload'),$product->image);
        }
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
            'description' => $input['description']
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
        $cate = Category::all();
        $trade = Trademark::all();
        return view('backend.content.product.edit', compact('product','category','trademark','cate','trade'));
    }

    public function delete($id,Product $product)
    {
        $product->where('id',$id)->delete();
        return response()->json([
            "success"=>"Bạn xóa thành công"
        ]);
    }
}
