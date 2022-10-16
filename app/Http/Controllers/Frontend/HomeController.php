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
use App\Models\User;
use App\Models\Color;
use App\Models\DanhGia;
use DB;
use Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Session;
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
        $order->sanphamtuvan = $input['id'];
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
    public function sent(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        require base_path("vendor/autoload.php");
        $input = $request->all();
        $user= new User;
        $user->phone = $input['dienthoai'];
        $user->name = $input['ten'];
        $user->address = $input['diachi'];
        $user->save();

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
        $mail->setFrom('minhvu21091@gmail.com', 'Khách hàng #');
        $mail->addAddress('minhvu21091@gmail.com');
        $mail->addAddress('quang79513@st.vimaru.edu.vn');
        $mail->isHTML(true);  
        $mail->Subject = $input['ten'].' đăng ký liên hệ #'.date("d-m-Y H:i:s");
        $mail->Body    = '
            Tên: '.$input['ten'].'
            <br> 
            SĐT: '.$input['dienthoai'].'
            <br>
            Địa chỉ: '.$input['diachi'].'
        ';
        $mail -> CharSet = "UTF-8";

        if( !$mail->send() ) {
            return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
        }
        
        else {
            return back()->with("success", "Email has been sent.");
        }

   
    }
    public function color(){
        $config = Config::first();
        $menu = Navbar::all();
        $color = Color::all();
        return view('frontend.content.detail.color',compact('config','menu','color'));
    }

    public function rating(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if(isset($_POST['ten']) && isset($_POST['dienthoai']) && isset($_POST['sao']) && isset($_POST['noidung']) && isset($_POST['sanpham']) )
        {	

            $ten = $_POST['ten'];
            $dienthoai = $_POST['dienthoai'];
            $sao = $_POST['sao'];
            $noidung = $_POST['noidung'];
            $sanpham = $_POST['sanpham'];

            $danhgia = new DanhGia;
            $danhgia->sanpham = $sanpham;
            $danhgia->ten = $ten;
            $danhgia->dienthoai = $dienthoai;
            $danhgia->sao = $sao;
            $danhgia->noidung = $noidung;
            $id_danhgia = $danhgia->save();

            echo json_encode([
                "id" =>$id_danhgia,
                "ten" => $ten,
                "dienthoai" => $dienthoai,
                "sao" => $sao,
                "noidung" => $noidung,
                // "ngay" => date("d-m-Y"), 
                "sanpham" => $sanpham,
                "status" => 'success'
            ]);
        }
        else
        {
            echo json_encode([
                "id" =>'',
                "ten" => '',
                "dienthoai" => '',
                "sao" => '',
                "noidung" => '',
                "sanpham" => 0,
                "status" => 'fail'
            ]);
        }
    }
    public function login (){
        $config = Config::first();
        $menu = Navbar::all();
        return view('frontend.content.auth.login',compact('config','menu'));
    }
    public function register(){
        $config = Config::first();
        $menu = Navbar::all();
        return view('frontend.content.auth.register',compact('config','menu'));
    }

    public function insert_user(Request $request){
        if (isset($_POST['dangky'])) {
            $post_thanhvien = [
                'username' => $_POST['username'],
                'password' => bcrypt($_POST['password']),
                'email' => $_POST['email'],
                'name' => $_POST['fullname'],
                'phone' => $_POST['dienthoai'],
                'address' => $_POST['diachi'],
            ];
            $info = DB::table('users')
            ->select('*')
            ->where('phone','=',$_POST['dienthoai'])
            ->get();
            if(!$info->isEmpty()) {
                echo '<p class="log-mes">Tài khoản đã tồn tại <span><a href="../login">đăng nhập</a></span></p><br><br>';
            } else {
                $user = new User;
                $user->insert($post_thanhvien);
                echo "<p class='log-access' style='font-size:20px'>Đăng ký tài khoản thành công <span><a href='../login'>click đăng nhập</a></span></p><br><br>";
            }
        }
    }

    public function post_login(Request $request){
        if (isset($_POST['login'])) {
            $post_thanhvien = [
                'username' => $_POST['user'],
                'password' => $_POST['pass'],
            ];

            $kiemtra = DB::table('users')
            ->where('username','=',$post_thanhvien['username'])
            ->get(); 
            if (isset($kiemtra[0])) {
                if (Hash::check( $post_thanhvien['password'], $kiemtra[0]->password)) {
                    session()->put('khachid', $kiemtra[0]->id);
                    session()->put('khachtaikhoan', $kiemtra[0]->username);
                    session()->put('khachten', $kiemtra[0]->name);
                    return redirect()->route('taikhoan');
                }else{
                    echo "
                    <script> 
                    alert('Mật khẩu không đúng')</script>";
                    return redirect()->back();
                }
            } else {
                echo "<p class='log-mes'>Tên hoặc mật khẩu không đúng <a href='./'>Quay lại</a> </p>";
                return redirect()->back();
            }
        }
    }

    public function taikhoan(){
        $config = Config::first();
        $menu = Navbar::all();
        return view('frontend.content.auth.taikhoan',compact('config','menu'));
    }
    public function logout(){
        Session::forget('khachid');
        Session::forget('khachtaikhoan');
        Session::forget('khachten');
        return redirect()->route('home');
    }
    public function reset_passd(User $user,Request $req){
        if(isset($_POST['reset']))
        {
            $post_thanhvien=[
                'password' => bcrypt($_POST['password']),
            ];
            $users = $user->find($_POST["id"]);
            $users->update($post_thanhvien);
            return redirect()->route('taikhoan');
        }
    }
    public function reset_info(User $user,Request $req){
        if(isset($_POST['update']))
        {
            if( $_POST['email']!='' && $_POST['fullname']!='' && $_POST['dienthoai']!='' && $_POST['diachi']!='' )
            {
                $post_thanhvien=[
                    'email' => $_POST['email'],
                    'name' => $_POST['fullname'],
                    'phone' => $_POST['dienthoai'],
                    'address' => $_POST['diachi'],
                ];
                $users = $user->find($_POST["id"]);
                $users->update($post_thanhvien);
                session()->put('khachten',$_POST['fullname']);
                return redirect()->route('taikhoan');
            }
        }
    }

    
}   
