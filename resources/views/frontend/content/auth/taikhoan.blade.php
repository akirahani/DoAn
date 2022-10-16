@extends('frontend.index')
@section('content')
<style>
    @media all and (min-width: 0){li{list-style-type: none;}.thong-tin{width:calc(100% - 30px);padding:15px;margin:auto;background-color:#fff;margin-top:20px}.thong-tin h2{font-size:16px;padding-bottom:10px;color:#2264D1;text-transform:uppercase}.thong-tin p{padding-bottom:5px}.thong-tin input[type="text"],.thong-tin input[type="email"],.thong-tin input[type="password"]{width:100%;height:40px;margin-bottom:15px;border:1px solid #CCC;outline:none;font-family:"UTM Helve";font-size:15px;padding:0 10px}.thong-tin input[type="submit"]{background-color:#2264D1;border:none;outline:none;color:#fff;font-family:"UTM Helve";padding:10px 15px;cursor:pointer;border-radius:5px}.accordion{position:relative;width:calc(100% - 30px);height:auto;margin:20px auto}.accordion .set{position:relative;width:100%;height:auto;background-color:#FFF}.accordion .set b{display:block;padding:10px 15px;text-decoration:none;color:#555;font-weight:600;border-bottom:1px solid #ececec;-webkit-transition:all 0.2s linear;-moz-transition:all 0.2s linear;transition:all 0.2s linear;cursor:pointer}.accordion .set b.active{background-color:#2264D1;color:#fff}.accordion .set b .fa-plus{display:block;width:20px;height:20px;position:absolute;top:10px;right:10px;background-image:url(../image/user/plus.svg);background-size:100% auto;background-repeat:no-repeat}.accordion .set b .fa-minus{display:block;width:20px;height:20px;position:absolute;top:10px;right:10px;background-image:url(../image/user/minus.svg);background-size:100% auto;background-repeat:no-repeat}.accordion .set .content{background-color:#fff;border-bottom:1px solid #ddd;display:none}.accordion .set .content p{padding:10px 15px;margin:0;color:#333}}@media all and (min-width: 521px){.thong-tin{width:500px}.accordion{max-width:500px}}@media all and (min-width: 1201px){nav ul{display:none}}
/*# sourceMappingURL=tai-khoan.css.map */
</style>
<main>
<section class="thong-tin">
    <?php  if(Session::get('khachtaikhoan') != NULL){
        $kiemtra = DB::table('users')
        ->where('username','=',Session::get('khachtaikhoan'))
        ->get();
    ?>
    <h2>Thông tin tài khoản</h2>
    <form method="post" action="{{url('doithongtin')}}">
        @csrf
        <input type="hidden" value="<?=$kiemtra[0]->id?> " name="id">
        <p>Tài khoản</p>
        <input type="text" name="username" placeholder="Tài khoản" spellcheck="false" autocomplete="off" value="<?php echo $kiemtra[0]->username  ?>" disabled />
        <p>Tên đầy đủ</p>
        <input type="text" name="fullname" placeholder="Fullname" spellcheck="false" autocomplete="off" value="<?php echo $kiemtra[0]->name  ?>" />
        <p>Email</p>
        <input type="email" name="email" placeholder="Email" spellcheck="false" autocomplete="off" value="<?php echo $kiemtra[0]->email  ?>" />
        <p>Điện thoại</p>
        <input type="text" name="dienthoai" placeholder="Điện thoại" spellcheck="false" autocomplete="off" value="<?php echo $kiemtra[0]->phone  ?>" />
        <p>Địa chỉ</p>
        <input type="text" name="diachi" placeholder="Địa chỉ" spellcheck="false" autocomplete="off" value="<?php echo $kiemtra[0]->address  ?>" />
        <input type="submit" name="update" value="Cập nhật" />
    </form>
    <?php } ?>
</section>

<section class="thong-tin">
    <h2>Đổi mật khẩu tài khoản</h2>
    <form method="post" action="{{url('doimatkhau')}}">
        @csrf
        <input type="hidden" value="<?=$kiemtra[0]->id?> " name="id">
        <p>Mật khẩu</p>
        <input type="password" name="password" placeholder="Mật khẩu mới" spellcheck="false" autocomplete="off" />
        <input type="submit" name="reset" value="Cập nhật" />
    </form>
</section>
<section class="thong-tin">
<?php 
    $data_donhang = DB::table('orders')
    ->where('tel','=',$kiemtra[0]->phone)
    ->get();

    $method = DB::table('method')
    ->get();

    foreach ($data_donhang as $key => $value) {
        $key++;
        echo '<div style="background: rgb(41, 188, 41)">Đơn tạo ngày:'.$value->created_at.' </div>';
        echo '<li> Tổng đơn <span style="color:red">'.number_format($value->total_price,0,".",".").'</span></li>';
        echo '<li>';
        if($value->status == 4){
            echo '<b style="color:blue">Đơn đã hoàn thành</b>';
            echo '<div>Thời gian: '.$value->giohoanthanh.'</div>';
        }else if($value->status == 5){
            echo '<b style="color:orange">Đơn đã hủy</b>';
        }
        else{
            echo '';
        }
        echo '<div>Phương thức thanh toán: </div>';
        echo '</li>';
    }
?>
</section>
</main>
<script>
    $(document).on("click", "nav h2", function(){
        $("nav ul").slideToggle(300);
    });
    $(document).ready(function() {
        $(".set > b").on("click", function() {
            if ($(this).hasClass("active")) 
            {
                $(this).removeClass("active");
                $(this).siblings(".content").slideUp(200);
                $(".set > b i").removeClass("fa-minus").addClass("fa-plus");
            } 
            else {
                $(".set > b i").removeClass("fa-minus").addClass("fa-plus");
                $(this).find("i").removeClass("fa-plus").addClass("fa-minus");
                $(".set > b").removeClass("active");
                $(this).addClass("active");
                $(".content").slideUp(200);
                $(this).siblings(".content").slideDown(200);
            }
        });
    });
</script>
@endsection