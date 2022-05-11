@extends('frontend.index')
@section('content')
<style>
    .tab-ins{
        background: linear-gradient(rgb(248, 144, 84), #399edc);
    }
    .fa-home {
        color:  rgb(237, 175, 113);
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
    .modal{
        width: 600px;
        height: 450px;
        position: absolute;
        z-index: 8;
        left: 0;
        right: 0;
        top: 20%;
        margin: 0 auto;
        background: #ddd;
        background-color: #fff;
    }
    /* tab */
    .tab-in .nav{
        display: flex;
		padding: 20px 0 10px 8px;
    }
    .tab-in .nav .tablink
    {
        border-right: 1px solid #000;
        color: #000;
        font-size: 30px;
        line-height: 1.2;
        padding:0 10px;
        cursor: pointer;
    }

    .tab-in .nav .tablink:last-child{
        border-right: none;
    }
	.tab-content{
        display: none;
        margin: 0 18px 25px 18px;
    }
    .tab-content h3{
        padding-top: 10px;
        font-weight: 600;
        color:#e18a8a;
    }
    .tab-content p{
        line-height: 1.7;
        font-size: 15px;
        text-align: justify;
    }
</style>
<div class="tab-ins">
    <div class="inline">
        <a rel="stylesheet" href="{{ url('/') }}"><i class="fas fa-home"></i></a>
        <i class="fas fa-chevron-right"></i>
        <a class="title-news" style="padding-left:6px; color:#fff; ">Chi tiết sản phẩm</a>
    </div>
</div>
<div class="title-page"><h1>{{$product->name}}</h1></div>
<div class="line-up"></div>
<div class="all-full-product container">
    <div class="get-category" style="margin: 80px auto; display: block; width: 700px;">
        <div style="display:flex; justyfy-content: center; align-items: center;">
            <div class="thumb-images">
                <div class="image">
                    <img src="../../assets/image/upload/{{$product->image}}"
                        alt="{{$product->name}}" style="width:100%">
                </div>       
            </div>
            <div class="caption mt-5">
                <ul class="info-detail-product" style="list-style:none; ">
                    <li class="main-detail-product" style="white-space: nowrap; "  ><h3 style="font-weight:600;">Thương hiệu: <b style ="color:red">{{$product->trademark_id}}</b> </h3></li>
                    <li class="main-detail-product" style="white-space: nowrap;  " ><h3 style="font-weight:600;">Loại sản phẩm: <b style ="color:red"> {{$product->category_id}}</b> </h3></li>
                    <li class="main-detail-product" style="white-space: nowrap ; " ><h3 style="font-weight:600;"><b style ="color:red"> Giá: Liên hệ</b></h3></li>
                </ul>
                <div class="button-submit ml-4">
                    <a href="{{url('/detail/cart/add',$product->id)}}" class="btn btn-success mb-3" style="width:140px;">Thêm vào giỏ hàng</a>
                    <a class="btn btn-info mb-3 contact-modal" style="width:140px">Liên hệ để được tư vấn</a>
                </div>
            </div>  
        </div>
    </div>
    <section class="tab-in">
        <div class="nav">
            <div href="#gt" class="tablink">Giới thiệu</div>
            <div href="#huong-dan" class="tablink">Hướng dẫn sử dụng</div>
            <div href="#thong-so" class="tablink">Thông số kỹ thuật</div>
            <div href="#dung-cu" class="tablink">Dụng cụ</div>
        </div>
        <div id="gt" class="tab-content">
            <div class="info-skill p-3" style="line-height: 3rem;">
                {!!$product->description!!}
            </div>
        </div>	
        <div id="huong-dan" class="tab-content">
            <div class="info-skill p-3" style="line-height: 3rem;">
                {!!$product->tutorial!!}
            </div>
        </div>
        <div id="thong-so" class="tab-content">
            <div class="info-skill p-3 row">
                <div class="col-lg-6 indetail-info ">
                    <p  class="mt-2" style="border-bottom: double "><b>Thành phần</b></p>
                    <p>{!!$product->ingredient!!}</p>
                </div>
                <div class="col-lg-6 indetail-info ">
                    <p  class="mt-2" style="border-bottom: double "><b>Màu sắc</b></p>
                    <p>{!!$product->color!!}</p>
                </div>
                <div class="col-lg-6 indetail-info ">
                    <p  class="mt-2" style="border-bottom: double "><b>Bề mặt</b></p>
                    <p>{!!$product->face_paint!!}</p>
                </div>
                <div class="col-lg-6 indetail-info ">
                    <p  class="mt-2" style="border-bottom: double "><b>Tỷ trọng</b></p>
                    <p>{!!$product->proportion!!}</p>
                </div>
                <div class="col-lg-6 indetail-info ">
                    <p  class="mt-2" style="border-bottom: double "><b>Hàm lượng rắn theo thể tích</b></p>
                    <p>{!!$product->solid_content!!}</p>
                </div>
                <div class="col-lg-6 indetail-info ">
                    <p  class="mt-2" style="border-bottom: double "><b>Độ dày màng sơn khô</b></p>
                    <p>{!!$product->dry_paint_film!!}</p>
                </div>
                <div class="col-lg-6 indetail-info ">
                    <p  class="mt-2" style="border-bottom: double "><b>Độ dày màng sơn ướt</b></p>
                    <p>{!!$product->wet_paint_film!!}</p>
                </div>
                <div class="col-lg-6 indetail-info ">
                    <p  class="mt-2" style="border-bottom: double "><b>Tiêu hao lý thuyết</b></p>
                    <p>{!!$product->theoretical_attrition!!}</p>
                </div>
                <div class="col-lg-6 indetail-info ">
                    <p  class="mt-2" style="border-bottom: double "><b>Thời gian khô</b></p>
                    <p>{!!$product->dry_time!!}</p>
                </div>
                <div class="col-lg-6 indetail-info ">   
                    <p  class="mt-2" style="border-bottom: double "><b>Khô bề măt</b></p>
                    <p>{!!$product->surface_dry!!}</p>
                </div>
                <div class="col-lg-6 indetail-info ">
                    <p  class="mt-2" style="border-bottom: double "><b>Sơn lớp kế tiếp</b></p>
                    <p>{!!$product->paint_next_layer!!}</p>
                </div>
                <div class="col-lg-6 indetail-info ">
                    <p  class="mt-2" style="border-bottom: double "><b>Khô hoàn toàn</b></p>
                    <p>{!!$product->complete_dry!!}</p>
                </div>
            </div>
        </div>
        <div id="dung-cu" class="tab-content">
            <div class="info-skill p-3 row">
                <div class="col-lg-6 indetail-info ">
                    <p  class="mt-2" style="border-bottom: double "><b>Dụng cụ</b></p>
                    <p>{!!$product->tool!!}</p>
                </div>
                <div class="col-lg-6 indetail-info ">
                    <p  class="mt-2" style="border-bottom: double "><b>Pha loãng dung môi</b></p>
                    <p>{!!$product->solvent!!}</p>
                </div>
            </div>
        </div>
    </section>
    <div class="modal">
        <div class="exit mb-5" style="float: right">x</div>
        <br>
        <hr>
        <div class="title-page"><h1>{{$product->name}}</h1></div>
        <br>
        <input class ="name form-control" type="text" autocomplete="false" spellcheck="false" placeholder="Tên của bạn" style="width: 500px; margin: 0 auto; display: block;">
        <br><br>
        <input class ="tel form-control" type="text" autocomplete="false" spellcheck="false" placeholder="Số điện thoại" style="width: 500px; margin: 0 auto; display: block;"> 
        <br><br>
        <input class ="address form-control" type="text" autocomplete="false" spellcheck="false" placeholder="Địa chỉ" style="width: 500px; margin: 0 auto; display: block;">
        <br><br>
        <input type="button" value="Gửi" class="btn btn-success" style="width: 300px; margin: 0 auto; display: block;" product = "{{$product->name}}" >
    </div>
</div>
<script>
    $('.contact-modal').click(function(){
        $('.modal').show();
        $('body').css('background-color','#ddd');
    });
    $('.exit').click(function(){
        $('.modal').hide();
        $(this).css('cursor','pointer');
        $('body').css('background-color','#fff');
    });
    $('input[type=button]').click(function(){
        var product = $(this).attr('product');
        var address = $('.address').val();
        var tel = $('.tel').val();
        var name = $('.name').val();
        if(address == '' || tel == '' || name == '' ){
            alert('Bạn cần điền đủ thông tin xin tư vấn');
        }
        else{
            $.ajax({
                type: 'POST',
                url: '/product/consultant',
                data: {
                    "_token": "{{ csrf_token() }}",
                    product: product,
                    address: address,
                    tel: tel,
                    name: name,
                },
                success:function(data){
                    $('.modal').hide();
                    $('body').css('background-color','#fff');
                    alert('Cảm ơn bạn, chúng tôi sẽ liên hệ với bạn sớm nhất !')
                }
            });
        }
    });
    $(function() {
        $('.tab-content:first').show();
        $('.nav .tablink').click(function() {
            let currentTab = $(this).attr('href');
            $('.tab-content').hide();
            $(currentTab).show();
            return false;
        });
    });
</script>
@endsection