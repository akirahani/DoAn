<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;   
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Navbar;
use App\Models\Config;
use App\Models\Product;
use App\Models\News;
use DB;
class HomeController extends Controller
{
    function index(){
        $product_hot = Product::all();
        $news_first= News::first();  
        $news = News::all();
        $config = Config::first();
        $menu = Navbar::all()->sortBy('ordering');
        return view('frontend.index',compact('menu','config','product_hot','news','news_first'));
    }
    function introduce(){
        $config = Config::first();
        $menu = Navbar::all()->sortBy('ordering');
        $admin = Auth::guard('admin')->user();
        return view('frontend.content.introduce',compact('admin','config','menu'));
    }
}
