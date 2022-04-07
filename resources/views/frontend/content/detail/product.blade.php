@extends('frontend.index')
@section('content')
<style>
    .tab-in {
        width: 100%;
        height: 35px;
        background: linear-gradient(rgb(154, 152, 151), #06859b, rgb(64, 70, 72));
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
</style>
<div class="tab-in">
    <div class="inline">
        <a rel="stylesheet" href="{{ url('/') }}"><i class="fas fa-home"></i></a>
        <i class="fas fa-chevron-right"></i>
        <a class="title-news" style="padding-left:6px; color:#fff">Chi tiết sản phẩm</a>
    </div>
</div>
<div class="title-page"><h1>PRODUCTS DETAIL</h1></div>
<div class="line-up"></div>
<div class="all-full-product container">
    <div class="main-product row">
        <div class="get-category col-md-6 p-3" style="display: inline-flex">

                    <div class="thumb-image">
                        <div class="image">
                            <img src="../../assets/image/upload/{{$product->image}}"
                                alt="{{$product->name}}" style="width:100%">
                        </div>
                        
                    </div>
                    <div class="caption mt-4">
                        <h4 style="white-space: nowrap;" class="name text-uppercase">{{$product->name}}</h4>
                        <ul class="info-detail-product">
                            <li class="main-detail-product" style="white-space: nowrap;" >Thương hiệu: {{$product->trademark_id}}</li>
                            <li class="main-detail-product" style="white-space: nowrap;" >Loại sản phẩm: {{$product->category_id}}</li>
                            <li class="main-detail-product" style="white-space: nowrap;" >Giá: Liên hệ</li>
                        </ul>
                        <div class="button-submit" style="width: 120px;white-space: nowrap;">
                            <a href="" class="btn btn-success">Thêm vào giỏ hàng</a>
                            <a href="" class="btn btn-info" >Liên hệ để được tư vấn</a>
                        </div>
                    </div>    
        </div>
        <div class="all-description col-md-6 mt-3">
            <p class="description-detail ">
                {!!$product->description!!}
            </p>
        </div>
        <div class="get-all col-md-6 mb-3">
            <div class="tab-in">
                <div class="inline">
                    <a class="title-info-product-in " style="padding-left:6px; color:#fff">Thông số kỹ thuật</a>
                </div>
            </div>
            <p  class="mt-2" style="h "><b>Thành phần</b></p>
            <p>{!!$product->ingredient!!}</p>
            <p  class="mt-2" style="border-bottom: double "><b>Màu sắc</b></p>
            <p>{!!$product->color!!}</p>
            <p  class="mt-2" style="border-bottom: double "><b>Bề mặt</b></p>
            <p>{!!$product->face_paint!!}</p>
            <p  class="mt-2" style="border-bottom: double "><b>Tỷ trọng</b></p>
            <p>{!!$product->proportion!!}</p>
            <p  class="mt-2" style="border-bottom: double "><b>Hàm lượng rắn theo thể tích</b></p>
            <p>{!!$product->solid_content!!}</p>
            <p  class="mt-2" style="border-bottom: double "><b>Độ dày màng sơn khô</b></p>
            <p>{!!$product->dry_paint_film!!}</p>
            <p  class="mt-2" style="border-bottom: double "><b>Độ dày màng sơn ướt</b></p>
            <p>{!!$product->wet_paint_film!!}</p>
            <p  class="mt-2" style="border-bottom: double "><b>Tiêu hao lý thuyết</b></p>
            <p>{!!$product->theoretical_attrition!!}</p>
            <p  class="mt-2" style="border-bottom: double "><b>Thời gian khô</b></p>
            <p>{!!$product->dry_time!!}</p>
            <p  class="mt-2" style="border-bottom: double "><b>Khô bề măt</b></p>
            <p>{!!$product->surface_dry!!}</p>
            <p  class="mt-2" style="border-bottom: double "><b>Sơn lớp kế tiếp</b></p>
            <p>{!!$product->paint_next_layer!!}</p>
            <p  class="mt-2" style="border-bottom: double "><b>Khô hoàn toàn</b></p>
            <p>{!!$product->complete_dry!!}</p>

        </div>
        <div class="get-all col-md-6 mb-3">
            <div class="tab-in">
                <div class="inline">
                    <a class="title-info-product-in" style="padding-left:6px; color:#fff">Dụng cụ</a>
                </div>
            </div>
            <p  class="mt-2" style="border-bottom: double "><b>Dụng cụ</b></p>
            <p>{!!$product->tool!!}</p>
            <p  class="mt-2" style="border-bottom: double "><b>Pha loãng dung môi</b></p>
            <p>{!!$product->solvent!!}</p>
            {{--  --}}
            <div class="tab-in">
                <div class="inline">
                    <a class="title-info-product-in" style="padding-left:6px; color:#fff">Hướng dẫn sử dụng</a>
                </div>
            </div>
            <p>{!!$product->tutorial!!}</p>
        </div>
    </div>

</div>
@endsection