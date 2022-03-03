<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $product = Product::all();

        return view('backend.content.product.index',compact('product','admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert()
    {
        $admin = Auth::guard('admin')->user();
        $product = Product::all();
        // dd($product);
        $category = Category::all();
        return view('backend.content.product.insert',compact('category','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $product = new Product();
        $input = $request->all();
        $product->name = $request['name'];
        $product->godname = $request['godname'];
        if($request->hasfile('image')){
            $image = $request ->file('image');
            $product->image = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/assets/image/upload'),$product->image);
        }
        $product->save();
        return redirect()->route('admin.product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $admin = Auth::guard('admin')->user();
        $input = $request->all();
        $id = $input['id'];
        $arr = array(
            'name'=>$input['name'],
            'godname'=>$input['godname'],

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
        $category = Category::all();
        return view('backend.content.product.edit', compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id,Product $product)
    {
        $product->where('id',$id)->delete();
        return response()->json([
            "success"=>"Bạn xóa thành công"
        ]);
    }
}
