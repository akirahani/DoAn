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
use DB;
class HomeController extends Controller
{
    function index(){
        $product_hot = DB::table('products')
        ->where('status','=',2)
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
        $menu = Navbar::all()->sortBy('ordering');
        $admin = Auth::guard('admin')->user();
        return view('frontend.content.list_navbar.product',compact('admin','config','menu'));
    }
    // detail
    public function news_detail($id){
        $news = News::find($id);
        $admin = Auth::guard('admin')->user();
        return view('frontend.content.detail.news',compact('news','admin')); 
    }
}
