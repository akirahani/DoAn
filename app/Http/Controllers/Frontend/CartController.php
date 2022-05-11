<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Product;
use App\Models\Category;
use App\Cart;
use App\Models\Config;
use App\Models\Navbar;
class CartController extends Controller
{
    public function index(){
        $products = DB::table('products')->get();
        $config = Config::first();
        $menu = Navbar::all()->sortBy('ordering');
        $cart_session = Session('cart') ? Session('cart') : null;
        $cart_new = new Cart($cart_session);
        return view('frontend.content.detail.cart',compact('products','cart_new','menu','config')); 
    }
    public function addCart(Request $request ,$id){
        $product = DB::table('products')->where('id',$id)->first();
        $config = Config::first();
        $menu = Navbar::all()->sortBy('ordering');
        if($product != null){
                $cart_session = Session('cart') ? Session('cart') : null;
                $cart_new = new Cart($cart_session);
                $cart_new->addCart($product,$id);
                $request->Session()->put('cart',$cart_new);
        }
        
        return view('frontend.content.detail.cart',compact('cart_new','product','config','menu'));
    }
    public function delCart(Request $request ,$id){
        $config = Config::first();
        $menu = Navbar::all()->sortBy('ordering');
        $cart_session = Session('cart') ? Session('cart') : null;
        $cart_new = new Cart($cart_session);
        $cart_new->delCart($id);
        
        if(Count($cart_new->products) >0){
            $request->Session()->put('cart',$cart_new);  
        }
        else{
            $request->Session()->forget('cart');  
        }
        return view('frontend.content.detail.cart',compact('cart_new','menu','config'));
    }
    public function softCart(Request $request,$id){
        $product = DB::table('products')->where('id',$id)->first();
        $config = Config::first();
        $menu = Navbar::all()->sortBy('ordering');
        if($product != null){
                $cart_session = Session('cart') ? Session('cart') : null;
                $cart_new = new Cart($cart_session);
                $cart_new->addCart($product,$id);
                $request->Session()->put('cart',$cart_new);
        }
    

        return redirect()->route('detail.product',$id)->with('alert', 'Sản phẩm đã được thêm vào giỏ hàng');
    }
    public function updateCart(Request $request){
        $config = Config::first();
        $menu = Navbar::all()->sortBy('ordering');
        foreach($request->data as $data){
            $cart_session = Session('cart') ? Session('cart') : null;
            $cart_new = new Cart($cart_session);
            $cart_new->updateCart($data['key'],$data['value']);
            $request->Session()->put('cart',$cart_new);
        }
 
      
        return view('frontend.content.detail.cart',compact('cart_new','category','menu','config'))->with('alert', 'Sản phẩm đã được cập nhật');
    }
}
