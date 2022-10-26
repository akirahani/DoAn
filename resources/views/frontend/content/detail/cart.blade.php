@extends('frontend.index')
@section('content')
    <style>
        .main-product img{
            width:100%; 
        }
        .backandnext {
            display: inline-flex;
            padding:2px;
        }
        .backandnext i{
            margin-top:2px;
        }
        .backandnext p{
            margin-left:2px;
        }
        .image-product img{
            width:100%;
        }
        .content-product{
            color:#6eaaa8;
            text-align:center;
        }
        .form-all-info-product{
            padding:1%;

        }
        .no-info{
            padding:2%;
      
        }
        .info-product-doing-cart 
        {
            padding: 15px;
            border-radius: 10px;
            background-color: #f8f8f8;
        }
        .maintain-product{
            padding: 15px;
            border-radius: 10px;
            background-color: #f8f8f8;
        }

        .title-hot{
            margin-left: 10px;
            border-left: 4px solid green;
            margin-top: 2%;
            padding-left: 1%;
        }

        .icon-price{
        color: red;
    }
    #price{
        font-size:20px;
    }
    .take_price{
        color:red;
    }
    /* .name-product{
        white-space: nowrap;
    }    */
    .action-choice{
        margin-top: 15px;
    }
    .action-choice .btn-danger{
        margin-top: 15px;
        height:60px;
        font-size: 30px;
    }
    .action-choice .btn-info{
        margin-top: 15px;
        height:60px;
        font-size: 30px;
    }
    .title-android{
        margin-left: 10px;
        border-left: 4px solid green;
        margin-top:2%;
        padding-left:1%;
    }
    .detail-phone img{
        width: 100%;
    }
    .icon-price{
        color: red;
    }
    /* chia 5 cột */
    .col-2dot4{
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
        -webkit-box-flex: 0;
        -ms-flex: 0 0 20%;
        flex: 0 0 20%;
        max-width: 20%;
    }
    .info-android{
        padding:5px;
        text-align:center;
    }
    .banner-cut2 img{
        margin: 0 0 15px 0;
        width: 100%;
    }
    .price-detail{
        text-align:center;
        display:flex;
    }
    .check-cart{
      
    }
    .check-cart td{
        margin-left:50px;
        padding: 30px;
    }
    .total-all{
        display: flex;
        color: green;  
    }
    .total-price{
        margin-left:70%;
    }
    .img-cartnull{
        /* margin-top: 0; */
        background-image: url("{{asset('upload/img-frontend/cartnull.png')}}");
        font-weight: 500;
        background-size: 350px;
        height: 50vh;
        margin-bottom: 0;
        background-repeat: no-repeat;
        background-position: center;
        color: #ec0000;
        font-size: 0;
    }
    .btn-default{
        color: green;
        width:30%;
        font-size: 25px;
        height: 50px;
        margin:auto; 
        text-align:center; 
        display:block;
    }
    .far.fa-save{
        font-size:30px;
    }
  

    </style>

    <style>
    .tab-in {
        width: 100%;
        height: 35px;
        /* background: linear-gradient(rgb(154, 152, 151), #06859b, rgb(64, 70, 72)); */
        background: linear-gradient(rgb(248, 144, 84), #399edc);
    }

    .fa-home {
        color: rgb(237, 175, 113);
        font-size: 20px;
        padding: 8px 0 0 30px;
    }

    .inline a {
        color: rgb(208, 108, 57);
        padding-left: 2%;
    }
    .title-page h1{
        text-align: center;
        color: rgb(208, 108, 57);
        margin-top:2%;
    }
    .line-up {
        margin: 10px 350px 0 350px;
        height: 7px;
        border-radius: 2rem;
        background: rgb(209, 124, 19);
    }
    .img-product-in{
        width:220px;
        height: 160px;
      
    }
    .border-in{
        border-radius: 10px;
        box-shadow: 5px 10px #888888;
    }
    .thumb-images{
        width:350px;
    }
    .quantity-table{
        margin: 20px auto;
    }
</style>
<div class="tab-in">
    <div class="inline">
        <a rel="stylesheet" href="{{ url('/') }}"><i class="fas fa-home"></i></a>
        <i class="fas fa-chevron-right"></i>
        <a class="title-news" style="padding-left:6px; color:#fff; ">Gio hàng</a>
    </div>
</div>
     
            @if(Session::has('cart') != NULL)
            <form action="{{url('/order/insert')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="detai-cart">
                    <table class="quantity-table"> 
                     
                        @foreach(Session::get('cart')->products as  $value)
                        <tr  class="check-cart" >
                            <input name="product_id[]" type="text" id="product-id" hidden value="{{$value['infoProduct']->id}}">
                            <td></td>
                            <td style="width:270px; height: 140px;"><img style="width:100%" src="../../../assets/image/upload/{{$value['infoProduct']->image}}" alt="" ><p></p> </td>
                            <td><b>{{$value['infoProduct']->name}}</b></td>
                            <td><input name="quantity[]" class="form-control" data-id="{{$value['infoProduct']->id}}" max="{{number_format($value['infoProduct']->quantity)}}" id="quantity-{{$value['infoProduct']->id}}" type="number" min="1" value="{{$value['quantity']}}" ></td>
                            <td style="color:red"><b>{{number_format($value['infoProduct']->price)}}</b></td>
                            <td ><a href="{{url('/cart/delete',$value['infoProduct']->id)}}"  class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                         
                        </tr>
                        @endforeach
                        <tr  class="check-cart" >
                          <td></td>
                          <td ><h5><b>Cập nhật giỏ hàng</b></h5></td>
                          <td></td>
                          <td></td>
                          <td style="color:red"></td>
                          <td>   <a class="btn btn-info far fa-save"  id="saveCart"></a></td>
                       
                      </tr>  
                    </table>
                </div>
                <!-- <div class="total-all">
                    <h2><b>Tổng tiền: </b></h2>
                    <p class="total-price"><h2>{{number_format(Session::get('cart')->totalPrice)}}</h2></p>
                </div> -->
                <div class=" all-info-checkout container ">
                    <div class="info-customer row p-3">
                        <div class="info-checkout-detail col-7">
                        <p class="title-hot">
                            <strong class="in-detail-title-hot" style="font-size:18px;">
                                Thông tin thanh toán
                            </strong>
                        </p>
                        <hr style="margin-top:25px;">
                        <div class="form-text col-lg-6">
                            <label for="name">Tên</label>
                            <?php if(Session::get('khachtaikhoan') != NULL) {
                                $kiemtra = DB::table('users')
                                ->where('username','=',Session::get('khachtaikhoan'))
                                ->get();
                            ?>
                            <input id="name" type="text"  class="form-control" name="name" value="{{$kiemtra[0]->name}}" required>
                            <?php }else{
                                echo'<input id="name" type="text"  class="form-control" name="name" required>';
                            } ?>
                            
                        </div>
                        <div class="form-text col-lg-6">
                            <label for="phone">Số điện thoại</label>
                            <?php if(Session::get('khachtaikhoan') != NULL) {
                                $kiemtra = DB::table('users')
                                ->where('username','=',Session::get('khachtaikhoan'))
                                ->get();
                            ?>
                            <input id="phone" type="text" class="form-control" name="tel" value="{{$kiemtra[0]->phone}}" required>
                            <?php }else{
                                echo'<input id="phone" type="text" class="form-control" name="tel" required>';
                            } ?>
                            
                        </div>
                        <div class="form-text col-lg-6">
                            <label for="phone">Địa chỉ</label>
                            <?php if(Session::get('khachtaikhoan') != NULL) {
                                $kiemtra = DB::table('users')
                                ->where('username','=',Session::get('khachtaikhoan'))
                                ->get();
                            ?>
                            <input id="phone" type="text" class="form-control" name="address" value="{{$kiemtra[0]->address}}" required>
                            <?php }else{
                                echo'<input id="phone" type="text" class="form-control" name="address" required>';
                            } ?>
                            
                        </div>
                        <div class="form-text col-lg-6">
                            <label for="phone">Phương thức thanh toán</label>
                            <div class="pttt" style="display: flex; justify-content: space-around">
                                <?php $phuongthuc = DB::table('method')->get(); ?>
                                <?php foreach($phuongthuc as $val) {
                                ?>
                                    <div>
                                        <input id="phuongthuc" type="radio" class="" value="<?=$val->id?>" name="phuongthucthanhtoan" required><?=$val->ten?>
                                    </div>
                                <?php }
                                    ?>
                               
                            </div>
                            <div class="chitiet-chuyenkhoan" style="display:none">
                                <input type="text" class="form-control" placeholder="Ngân hàng" name="nganhang" />
                                <input type="text" class="form-control" placeholder="Số tài khoản" name="sotaikhoan" />
                            </div>
                        </div>
                        <div class="form-text col-lg-12">
                            <label for="phone">Ghi chú đơn hàng</label>
                            <textarea id="phone" type="text" class="form-control" name="note" ></textarea>
                        </div>
                    </div> 
                    <div class="info-checkout-detail col-5">
                        <p class="title-hot">
                                <strong class="in-detail-title-hot" style="font-size:18px;">
                                    Chi tiết hóa đơn
                                </strong>
                            </p>
                     
                        <table  class="table check-out-detail-product mt-5">
                            <tr style="margin-bottom:2%;">
                                <th style=" width: 80%">
                                        <p><b>Sản phẩm</b></p>
                                </th> 
                                <th style=" width: 20%"><b>Tạm tính</b>
                                 </th>
                            </tr>
                            @if(Session::has('cart') != NULL)
                            @foreach(Session::get('cart')->products as  $value)
                            <tr>
                                <td>
                                    <p>{{$value['infoProduct']->name}}  <b>x</b>  {{$value['quantity']}}</p>
                                </td> 
                                <td ><b style="color: red">{{number_format($value['infoProduct']->price)}}</b> </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <h4 style="color: green;"><b>Tổng số lượng: </b></h4>
                                </td> 
                                <td ><p class="total-price"><h4 style="color: green;" name="total_price" >{{number_format(Session::get('cart')->totalQuantity)}}</h4></p></td>  
                            </tr>
                            <tr>
                                <td>
                                    <h3 style="color: green;"><b>Tổng tiền: </b></h3>
                                </td> 
                                <td ><p class="total-price"><h3 style="color: green;"><input type="text" name="price-all" value="{{Session::get('cart')->totalPrice}}" hidden> {{number_format(Session::get('cart')->totalPrice)}}</h3></p></td>  
                            </tr>
                            @endif
                        </table>
                        <input type="submit" class="form-control btn btn-success" name="submit" value="Gửi" >
                    </div>    
                </div>
            </form>
            
            <script>

                // $('input[type="submit"]').click(function(){
                //     let quantity = parseInt($('.quantity-table tr td input').attr('max'));
                //     let number = parseInt($('.quantity-table tr td input').val());
                //     if(quantity < number){
                //         alert('Số lượng không đủ');
                //         window.location ="{{url('/detail/cart')}}";
                //     }
                // });
                // $('input[name="submit"]').click(function(){
                //     let 
                // });
                $('input[name="phuongthucthanhtoan"]').click(function(){
                    let val = $(this).val();
                    if(val == 2){
                        $('.chitiet-chuyenkhoan').slideToggle();
                    }else{
                        $('.chitiet-chuyenkhoan').hide();
                    }
                });
                $('#saveCart').on("click",function(){
                    let id = $('#product-id').val();
                    let arr = [];
                    $(".quantity-table tr td input").each(function(){
                        let obj = {key: $(this).data("id"), value: $(this).val() };
                        arr.push(obj);
                       
                    });
                    let quantity = parseInt($('.quantity-table tr td input').attr('max'));
                    let number = parseInt($('.quantity-table tr td input').val());
                    if(number <= quantity ){
                        $.ajax({
                            url: '/cart/update',
                            method: 'POST', 
                            data :{
                                "_token" :"{{csrf_token()}}",
                                "data" : arr,
                            },  
                            success:function(response){
                                window.location.href= '{{route('cart')}}'
                            }
                        });
                    }
                    else{
                        alert('Số lượng không đủ');
                    }
                 
                   
                    if($('#quantity-'+id).val() <=0){
                        $.ajax({
                        url: '/cart/delete/'+id,
                        method: 'GET', 
                        success:function(response){
                            window.location="{{url('/detail/cart')}}";
                        }
                    });
                    }
                });
                    
                
                
            </script>
            @else
                <div class="cart_null mt-5">
                    <div style="width:300px;height:20px; margin:0 auto;">
                        <img src="{{asset('assets/image/upload/images.png')}}" alt="" style="width:100%">
                    </div>
                    
                    <div class="img-cartnull">
                        Không có sản phẩm nào
                    </div>
                
                <h3 style="text-align: center;" >  <b>Không có sản phẩm nào </b></h3>
                <a href="{{url('/')}}"  class="btn btn-default">Quay lại mua hàng </a> 
                </div>
            @endif
         
        </div>
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
        @endsection
