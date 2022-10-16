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
        height: 550px;
        position: absolute;
        z-index: 8;
        left: 0;
        right: 0;
        top: 20%;
        margin: 0 auto;
        background-color: #ddd;
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
    .exit:before{
        display: inline-block;
        float: right;
        padding-right: 15px; 
        border-radius: 50%;
        font-size: 30px;
        cursor: pointer;
        content: "\00d7";
    }
    .owl-nav{
        right: 15px;
        position: absolute;
        top: 50%;
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
    .owl-nav button{
        background: #ddd!important;
        width: 25px;
        height: 25px;
        border-radius: 50%!important;
    }
    .owl-dots{
        width: 50px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between!important;
    }
    .owl-dot{
        background: #ddd!important;
        width: 10px!important;
        height: 10px!important;
        border-radius: 50%!important;
    }
    /* danhgia */
    .popup-danh-gia{
		position: fixed;
		top: 63px;
		left: 0;
		display: none;
		justify-content: center;
		align-items: center;
		background-color: rgba(0,0,0, 0.6);
		width: 100%;
		height: calc(100% - 63px);
		z-index: 8;
    }
	.popup-danh-gia	form{
        background-color: #fff;
        width: calc(100% - 100px);
        padding: 30px 20px 50px 20px;
    }
	.popup-danh-gia	form p{
        font-size: 15px;
        font-weight: 400;
    }
	.popup-danh-gia	form input[type="text"]{
        width: 100%;
        height: 38px;
        margin: 20px 0 0 0;
        border: 1px solid #CCC;
        outline: none;
        font-family: "Roboto";
        font-size: 15px;
        padding: 0 15px;
    }
	.popup-danh-gia	form input[type="button"]{
        padding: 8px 15px;
        display: block;
        margin: auto;
        margin-top: 20px;
        background-color: $vang;
        border: none;
        outline: none;
        border-radius: 5px;
        cursor: pointer;
        text-transform: uppercase;
        font-family: "Roboto";
        font-size: 15px;
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
            <div class="thumb-images owl-theme owl-carousel">
                <div class="image">
                    <img src="../../assets/image/upload/{{$product->image}}"
                        alt="{{$product->name}}" style="width:100%">
                </div>     
                <div class="image">
                    <img src="../../assets/image/upload/{{$product->image}}"
                        alt="{{$product->name}}" style="width:100%">
                </div> 
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
                    @if($product->quantity >0)
                        <li class="main-detail-product" style="white-space: nowrap ; " ><h3 style="font-weight:600;"><b style ="color:green"> Còn hàng</b></h3></li>
                    @else
                        <li class="main-detail-product"  style="white-space: nowrap ; " ><h3 style="font-weight:600;"><b style ="color:red"> Hết hàng</b></h3></li>
                    @endif
                    
                </ul>
                <div class="button-submit ml-4">
                    @if($product->quantity >0)
                        <a href="{{url('/detail/cart/add',$product->id)}}" class="btn btn-success mb-3" style="width:140px;">Thêm vào giỏ hàng</a>
                    @else   
                        <a disabled onclick=" alert('Sản phẩm đã hết hàng !')" class="btn btn-success mb-3" style="width:140px; background: #ddd">Thêm vào giỏ hàng</a>                     
                    @endif
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
    <section class="back-modal">
        <div class="modal">
            <div class="exit"></div>
            <br>
            <hr>
            <div class="title-page"><h1>{{$product->name}}</h1></div>
            <br>
            <?php if(Session::get('khachten') != NULL) { ?>
                <input class ="name form-control" type="text" value="<?=Session::get('khachten')?>" autocomplete="false" spellcheck="false" placeholder="Tên của bạn" style="width: 500px; margin: 0 auto; display: block;">
            <?php }else{
                echo'<input class ="name form-control" type="text" autocomplete="false" spellcheck="false" placeholder="Tên của bạn" style="width: 500px; margin: 0 auto; display: block;">';
            } ?>
            <br><br>
            <?php if(Session::get('khachtaikhoan') != NULL) {
                    $kiemtra = DB::table('users')
                    ->where('username','=',Session::get('khachtaikhoan'))
                    ->get();
                ?>
                <input class ="tel form-control" type="text" value="<?=$kiemtra[0]->phone?>" autocomplete="false" spellcheck="false" placeholder="Số điện thoại" style="width: 500px; margin: 0 auto; display: block;"> 
            <?php }else{
                echo'<input class ="tel form-control" type="text" autocomplete="false" spellcheck="false" placeholder="Số điện thoại" style="width: 500px; margin: 0 auto; display: block;"> ';
            } ?>

            <br><br>
            <?php if(Session::get('khachtaikhoan') != NULL) { ?>
                <input class ="address form-control" value="<?=$kiemtra[0]->address?>" type="text" autocomplete="false" spellcheck="false" placeholder="Địa chỉ" style="width: 500px; margin: 0 auto; display: block;">
                <?php }else{
                echo'<input class ="address form-control" type="text" autocomplete="false" spellcheck="false" placeholder="Địa chỉ" style="width: 500px; margin: 0 auto; display: block;">';
            } ?>
            
            <br><br>
            <input type="button" value="Gửi" class="btn btn-success btn-gui" style="width: 300px; margin: 0 auto; display: block;" id_product="{{$product->id}}" product = "{{$product->name}}" >
            <?php ?>
        </div>
    </section>
    <section class="danh-gia">
        <form  class="form-danhgia" enctype="multipart/form-data">
            @csrf
            <textarea placeholder="Viết bình luận" class="binh-luan-content form-control" style="height: 145px;"></textarea>
        </form>
        <div class="frame-image"></div>
        <p class="choose-star input-star">
            <span>Đánh giá</span>
            <img danhgia="1" data-id="<?=$product->id?>" src="{{asset('assets3/image/binhluan/star-xam.svg')}}" alt="Đánh giá sản phẩm"/>
            <img danhgia="2" data-id="<?=$product->id?>" src="{{asset('assets3/image/binhluan/star-xam.svg')}}"  alt="Đánh giá sản phẩm"/>
            <img danhgia="3" data-id="<?=$product->id?>" src="{{asset('assets3/image/binhluan/star-xam.svg')}}"  alt="Đánh giá sản phẩm"/>
            <img danhgia="4" data-id="<?=$product->id?>" src="{{asset('assets3/image/binhluan/star-xam.svg')}}"  alt="Đánh giá sản phẩm"/>
            <img danhgia="5" data-id="<?=$product->id?>" src="{{asset('assets3/image/binhluan/star-xam.svg')}}"  alt="Đánh giá sản phẩm"/>
        </p>
    </section>
    <div class="rate-users">
        <ul style="list-style:none;">
            <?php 
            $data_danhgia = DB::table('danh_gias')
            ->where('sanpham',$product->id)
            ->orderBy('id', 'desc')
            ->get();
            foreach ($data_danhgia as $key => $rate) 
            {
                $count_rated = $rate->sao;
                    ?>
                    <li danhgia="<?=$rate->id?>">
                        <div class="info"  style="display: flex;">
                            <div class="left" style="width:50px; height:50px">
                                <img style="width:100%" src="http://127.0.0.1:8000/assets3/image/ava.png" alt="Đánh giá"/>
                            </div>
                            <div class="right ml-3" >
                                <h3 style="font-size:20px;"><?=$rate->ten?></h3>
                                <p class="choose-star mb-2" style="margin-top: -15px;">
                                    <?php 
                                    for ($i=0; $i < $count_rated ; $i++) { 
                                        echo '<img  style="width:15px; height:15px" src="http://127.0.0.1:8000/assets3/image/binhluan/star-cam.svg" alt="Đánh giá sản phẩm"/>';
                                    }
                                    for ($i=0; $i < 5 - $count_rated ; $i++) { 
                                        echo '<img style="width:15px; height:15px" src="http://127.0.0.1:8000/assets3/image/binhluan/star-xam.svg" alt="Đánh giá sản phẩm"/>';
                                    }
                                    ?>

                                </p>
                                <p class="time" style="font-size: 12px; margin-top: -5px"><?=$rate->created_at?></p>
                            </div>
                        </div>
                        <div class="noi-dung">
                            <p><?=$rate->noidung?></p>
                        </div>
                    </li>
            <?php 
                }
            ?>
  
        </ul>
    </div>
    <div class="popup-danh-gia">
		<form enctype="multipart/form-data">
            @csrf
			<p></p>
			<input type="text" name="ten_khach" placeholder="Tên" autocomplete="off" spellcheck="false" />
			<input type="text" name="dienthoai_khach" placeholder="Điện thoại" autocomplete="off" spellcheck="false" />
			<input type="button" name="sentrate" value="Đánh giá" data-san-pham="<?=$product->id?>" />
			<input type="hidden" name="sao" value="0"/>
		</form>
	</div>
</div>
<script>
    // Danh gia
    $('.input-star img').click(function(){
        let sao = $(this).attr('danhgia');
        let noidung = $('.binh-luan-content').val();
        $('.input-star img').attr('src','http://127.0.0.1:8000/assets3/image/binhluan/star-xam.svg');
        for(var i= 1; i<= sao; i++ ){
            $('.input-star img[danhgia="'+i+'"]').attr('src','http://127.0.0.1:8000/assets3/image/binhluan/star-cam.svg');
        }
        if(noidung != ''){
            $(".popup-danh-gia").css("display", "flex");
    	    $(".popup-danh-gia form p").html(noidung);
            $('input[name="sao"]').attr('sao', sao);
            $('input[name="sentrate"]').click(function(){
            let ten = $('input[name="ten_khach"]').val();
            let dienthoai = $('input[name="dienthoai_khach"]').val();
            // let sao = $('input[name="sao"]').val();
            let noidung = $(".popup-danh-gia form p").text();
            let sanpham = $(this).attr("data-san-pham");
            //
            var form_data = new FormData();      
            var input_get = $('#image-comment').get(0);
            form_data.append('ten', ten);
            form_data.append('dienthoai', dienthoai);
            form_data.append('sanpham', sanpham);
            form_data.append('noidung', noidung);
            form_data.append('sao', sao);
            if(ten == '')
            {
                Swal.fire(
                    "",
                    "bạn chưa nhập tên",
                    "error"
                );
            }
            else
            {
                if(dienthoai != '')
                {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        data: form_data,
                        processData: false,
                        contentType: false,
                        url: "{{url('/rating')}}",
                        success:function(data)
                        {
                            let info = JSON.parse(data);
                    
                            if(info.status == "success")
                            {
                                $(".popup-danh-gia").hide();
                                $('.popup-danh-gia form input[name="sao"]').val(0);
                                // $('.input-star').html(`
                                // 	<span>Đánh giá</span>
                                // 	<img danhgia="1" data-id="${info.sanpham}" src="public/image/star-xam.svg" alt="Đánh giá sản phẩm">
                                // 	<img danhgia="2" data-id="${info.sanpham}" src="public/image/star-xam.svg" alt="Đánh giá sản phẩm">
                                // 	<img danhgia="3" data-id="${info.sanpham}" src="public/image/star-xam.svg" alt="Đánh giá sản phẩm">
                                // 	<img danhgia="4" data-id="${info.sanpham}" src="public/image/star-xam.svg" alt="Đánh giá sản phẩm">
                                // 	<img danhgia="5" data-id="${info.sanpham}" src="public/image/star-xam.svg" alt="Đánh giá sản phẩm">
                                // `);
                                $(".binh-luan-content").val('');
                                    let item = '';
                                    item += `<li>`;
                                        item += `<div class="info" style="display: flex;">`;
                                            item += `<div class="left" style="width:30px; height:30px">`;
                                                item += `<img  style="width:100%" src="http://127.0.0.1:8000/assets3/image/ava.png" alt="Đánh giá"/>`;
                                            item += `</div>`;
                                            item += `<div class="right">`;
                                                item += `<h3 style="font-size:15px;">${info.ten}</h3>`;
                                                item += `<p class="choose-star">`;
                                                    for (var i = 0; i < info.sao; i++) {
                                                        item += `<img style="width:20px; height:20px" src="http://127.0.0.1:8000/assets3/image/binhluan/star-cam.svg" alt="Đánh giá sản phẩm"/>`;
                                                    }
                                                    for (var i = 0; i < 5-info.sao; i++) {
                                                        item += `<img style="width:20px; height:20px" src="http://127.0.0.1:8000/assets3/image/binhluan/star-xam.svg" alt="Đánh giá sản phẩm"/>`;
                                                    }
                                                item += `</p>`;
                                            item += `</div>`;
                                        item += `</div>`;
                                        item += `<div class="noi-dung">`;
                                            item += `<p>${info.noidung}</p>`;
                                        item += `</div>`;
                                    item += `</li>`;
                                    $(".rate-users ul").prepend(item);
                                }
                                else
                                {
                                    Swal.fire(
                                        "",
                                        "gửi đánh giá bị lỗi",
                                        "error"
                                    );
                                }
                                $('.frame-image').css('display','none');	
                                        }
                                    })
                                }
                            else
                            {
                                Swal.fire(
                                    "",
                                    "bạn chưa nhập điện thoại",
                                    "error"
                                );
                            }
                        }
                    });
                }
                else{
                    // $(".lazy").hide();
                    Swal.fire(
                        'THẤT BẠI!',
                        'Có lỗi trong quá trình gửi đánh giá !',
                        'error'
                    );
                    $('.input-star img').attr('src','http://127.0.0.1:8000/assets3/image/binhluan/star-xam.svg');
                }
        });
    // Sent đánh giá


    // owl
    
    $('.thumb-images').owlCarousel({
        items: 1,
        margin: 10,
        nav: true,
        dots: true,
        lazyLoad: true
    }) 
    $('.contact-modal').click(function(){
        $('.modal').show();
        $('.back-modal').css('background-color','#fff');
    });
    $('.exit').click(function(){
        $('.modal').hide();
        $(this).css('cursor','pointer');
        $('body').css('background-color','#fff');
    });
    $('.btn-gui').click(function(){
        var product = $(this).attr('product');
        var id_pro = $(this).attr('id_product');
        var address = $('.address').val();
        var tel = $('.tel').val();
        var name = $('.name').val();
        if(address == '' || tel == '' || name == '' ){
            alert('Bạn cần điền đủ thông tin xin tư vấn');
        }
        else{
            $('.lazy').css('display','flex');
            $.ajax({
                type: 'POST',
                url: '/product/consultant',
                data: {
                    "_token": "{{ csrf_token() }}",
                    product: product,
                    id: id_pro, 
                    address: address,
                    tel: tel,
                    name: name,
                },
                success:function(data){
                    $('.lazy').hide();
                    $('.modal').hide();
                    $('body').css('background-color','#fff');
                    Swal.fire(
                        'THÀNH CÔNG!',
                        'Cảm ơn bạn, chúng tôi sẽ liên hệ với bạn sớm nhất !',
                        'success'
                    );
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