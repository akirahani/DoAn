<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;   
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Navbar;
use App\Models\Config;
use App\Models\Product;
use App\Models\News;
use App\Models\Trademark;
use App\Models\Category;
use DB;
class HomeController extends Controller
{
    function index(){
        $product_hot = DB::table('products')
        ->where('status','=',2)
        ->limit(4)
        ->orderBy('id','DESC')
        ->get();
        $news_first= News::first();  
        $news = News::all();
        $config = Config::first();
        $menu = Navbar::all()->sortBy('ordering');
        $trademark = Trademark::all();
        return view('frontend.content.home',compact('menu','config','product_hot','news','news_first','trademark'));
    }
    function introduce(){
        $config = Config::first();
        $menu = Navbar::all()->sortBy('ordering');
        $admin = Auth::guard('admin')->user();
        return view('frontend.content.list_navbar.introduce',compact('admin','config','menu'));
    }
    function news(){
        $config = Config::first();
        $news = News::All();
        $menu = Navbar::all()->sortBy('ordering');
        $admin = Auth::guard('admin')->user();
        return view('frontend.content.list_navbar.news',compact('admin','config','menu','news'));
    }
    function contact(){
        $config = Config::first();
        $menu = Navbar::all()->sortBy('ordering');
        $admin = Auth::guard('admin')->user();
        return view('frontend.content.list_navbar.contact',compact('admin','config','menu'));
    }
    function product(){
        $config = Config::first();
        $trademark = Trademark::all();
        $menu = Navbar::all()->sortBy('ordering');
        $admin = Auth::guard('admin')->user();
        $cate = Category::all();
        $product = Product::all();
        return view('frontend.content.list_navbar.product',compact('admin','config','menu','trademark','cate','product'));
    }
    // detail
    public function news_detail($id){
        $news = News::find($id);
        $admin = Auth::guard('admin')->user();
        $config = Config::first();
        $menu = Navbar::all()->sortBy('ordering');
        $news_other = DB::table('news')
        ->orderBy('id', 'DESC')
        ->where('id','!=',$id)
        ->get();
        return view('frontend.content.detail.news',compact('news','admin','config','menu','news_other')); 
    }
    public function product_detail($id){
        $product = Product::find($id);
        $category = DB::table('products')
        ->select('categories.*')
        ->join('categories','categories.id','=','products.category_id')
        ->get();
        $trademark = DB::table('products')
        ->select('trademarks.*')
        ->join('trademarks','trademarks.id','=','products.trademark_id')
        ->get();
    
            foreach($category as $k=> $value){
                if($product->category_id == $value->id)
                $product->category_id = $value->name ;
            }
            foreach($trademark as $k=>$vals){
                if($product->trademark_id == $vals->id)
                $product->trademark_id = $vals->name ;
            }

        $admin = Auth::guard('admin')->user();
        $config = Config::first();
        $menu = Navbar::all()->sortBy('ordering');
        $product_other = DB::table('news')
        ->orderBy('id', 'DESC')
        // ->where('id','!=',$id)
        ->get();
        return view('frontend.content.detail.product',compact('product','admin','config','menu','product_other')); 
    }
    
}
