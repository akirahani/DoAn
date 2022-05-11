@extends('frontend.index')
@section('content')
<style>
    .tab-in {
        width: 100%;
        height: 35px;
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
    .grid-product{
        padding: 30px;
        list-style:none;
        display:grid;
        grid-template-columns: 25% 25% 25% 25% ;
    }
    .grid-product .product-click{
        padding-right: 15px;
    }
</style>
<div class="tab-in">
    <div class="inline">
        <a rel="stylesheet" href="{{ url('/') }}"><i class="fas fa-home"></i></a>
        <i class="fas fa-chevron-right"></i>
        <a class="title-news" style="padding-left:6px; color:#fff">Sản phẩm</a>
    </div>
</div>
<div class="title-page"><h1>PRODUCTS</h1></div>
<div class="line-up"></div>
<div class="all-full-product">
    <div class="main-product row">
        <div class="col-md-1"></div>
        <div class="get-category col-md-2">
            <ul class="border p-5 mt-4" style="list-style:none; width:100%;">
                <div>
                    <p>Thương hiệu</p>
                </div>
                @foreach($trademark as $val)
                <li>
                    <input type="checkbox" name="trademark" value="{{$val->id}}" >{{$val->name}}
                </li>
                @endforeach
                <hr>
                <div>
                    <p>Loại sản phẩm</p>
                </div>
                @foreach($cate as $val)
                <li>
                    <input type="checkbox" name="category" value="{{$val->id}}" >{{$val->name}}
                </li>
                @endforeach
            </ul>
        </div>
        <div class="get-all col-md-8">
            <div class="grid-product">
                @foreach($product as $val)
                <div class="product-click">
                    <a href="{{url('/product/detail',$val->id)}}">
                        <div class="product-thumb " style="">
                            <div class="thumb-image">
                                <div class="image">
                                    <img src="assets/image/upload/{{$val->image}}"
                                        alt="{{$val->name}}" style="padding: 15%">
                                </div>
                            </div>
                            <div class="caption text-center">
                                <h5 class="name text-uppercase">{{$val->name}}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>  
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<script>
    $('input[name="category"]').click(function(){
       var id = $(this).val();
            $.ajax({
                type: "GET",
                data : {'category_id':id},
                url: "/product/ajax",
                success:function(data){
                    $('.get-all .grid-product').html(data);
                }
            });
    });
    $('input[name="trademark"]').click(function(){
       var id = $(this).val();
       $.ajax({
            type: "GET",
            data : {'trademark_id':id},
            url: "/product/ajax",
            success:function(data){
                $('.get-all .grid-product').html(data);
            }
       });
    });
</script>
@endsection