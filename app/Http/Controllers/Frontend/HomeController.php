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
use App\Models\Order;
use DB;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
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
    function product(Request $request){
        $config = Config::first();
        $trademark = Trademark::all();
        $menu = Navbar::all()->sortBy('ordering');
        $admin = Auth::guard('admin')->user();
        $cate = Category::all();   
        $product = DB::table('products')
        ->get();  
        return view('frontend.content.list_navbar.product',compact('admin','config','menu','trademark','cate','product'));
    }
    public function filter_poduct(Request $request){
        $config = Config::first();
        $trademark = Trademark::all();
        $menu = Navbar::all()->sortBy('ordering');
        $admin = Auth::guard('admin')->user();
        $cate = Category::all();   
        $product = [];
        if(!isset($_GET['category_id']) && !isset($_GET['trademark_id']))
        {
            $product = DB::table('products')
            ->get();
        }
        else if(isset($_GET['category_id'])){
            $id = $_GET['category_id'];
            $product = DB::table('products')
            ->select('*')
            ->where('category_id','=',$id)
            ->get();
            foreach($product as $val){
            echo'
                <div class="product-click">
                    <a href="/product/detail/'.$val->id.'">
                        <div class="product-thumb " style="">
                            <div class="thumb-image">
                                <div class="image">
                                    <img src="assets/image/upload/'.$val->image.'"
                                        alt="'.$val->name.'" style="padding: 15%">
                                </div>
                            </div>
                            <div class="caption text-center">
                                <h5 class="name text-uppercase">'.$val->name.'</h5>
                            </div>
                        </div>
                    </a>
                </div>
            ';
            }
        }
        else if(isset($_GET['trademark_id'])){
            $id = $_GET['trademark_id'];
            $product = DB::table('products')
            ->select('*')
            ->where('trademark_id','=',$id)
            ->get();
            foreach($product as $val){
                echo'
                <div class="product-click">
                    <a href="/product/detail/'.$val->id.'">
                        <div class="product-thumb " style="">
                            <div class="thumb-image">
                                <div class="image">
                                    <img src="assets/image/upload/'.$val->image.'"
                                        alt="'.$val->name.'" style="padding: 15%">
                                </div>
                            </div>
                            <div class="caption text-center">
                                <h5 class="name text-uppercase">'.$val->name.'</h5>
                            </div>
                        </div>
                    </a>
                </div>
                ';
            }
   
        }
     
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

    public function consultant(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        require base_path("vendor/autoload.php");
        $input = $request->all();
        $order = new Order;
        $order->status = 1;
        $order->tel = $input['tel'];
        $order->name = $input['name'];
        $order->address = $input['address'];
        $order->save();

        $mail = new PHPMailer();    
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';             
        $mail->SMTPAuth = true;
        $mail->Username = 'minhvu21091@gmail.com';   
        $mail->Password = 'jnndzzneqnjcklye';       
        $mail->SMTPSecure = 'tls';                 
        $mail->Port = 587;                      
        // $mail->SMTPOptions=array(
        //     'ssl'=>array(
        //         'verify_peer'=>false,
        //         'verify_peer_name'=>false,
        //         'allow_self_signed'=>true
        //     )
        // );
        $mail->setFrom('minhvu21091@gmail.com', 'son');
        $mail->addAddress('minhvu21091@gmail.com');
        $mail->isHTML(true);  
        $mail->Subject = $input['name'].' đăng ký nhận tư vấn #'.date("d-m-Y H:i:s");
        $mail->Body    = '
            Sản phẩm quan tâm: '.$input['product'].'
            <br> 
            Tên: '.$input['name'].'
            <br> 
            SĐT: '.$input['tel'].'
            <br>
            Địa chỉ: '.$input['address'].'
        ';
        $mail -> CharSet = "UTF-8";

        if( !$mail->send() ) {
            return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
        }
        
        else {
            return back()->with("success", "Email has been sent.");
        }

        return response()->json([
            "success"=>"Đặt nhận tư vấn thành công"            
        ]);
    }
    
}
