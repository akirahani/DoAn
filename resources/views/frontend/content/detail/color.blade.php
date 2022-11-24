@extends('frontend.index')
@section('content')
<style>
    .all-color{
        display: grid;
        grid-template-columns: repeat(auto-fill, calc(33.33% - 50px));
        justify-content: center;
    }
    .color{
        margin: 25px auto;
        border-radius: 3rem;
        width: 80%;
        height: 50px;
        cursor: pointer;
        color: #fff;
        border: none;
        outline:none;
    }
    #plus{
        width: 10px;
        height: 10px;
        display:none;
    }
    .color p{
        text-align: center;
        align-items: center;
        padding-top: 10px;
    }
    img{
        width: 100%;
    }
    .image-fill{
        width: 800px;
        margin: 0 auto;
    }
</style>
<style>
    #modal_pro_color{
          position: fixed;
          top: 100px;
          left: 0;
          display: none;
          justify-content: center;
          align-items: center;

          width: 100%;
          /* height: calc(100% - 63px); */
          z-index: 19;
    }
    #modal_pro_color form{
              background-color: #ffffff;
              width: 800px;
        margin: 10px auto;
              padding: 30px 10px 50px 10px;
    }
    #modal_pro_color h1{
      text-align: center;
    }
      .rows{
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }		
    .item-chi-paper{
        width: 50%;
    }
    #modal_pro_color .exit-chi1:before{
      display: inline-block;
      float: right;
      padding-right: 15px;
      border-radius: 50%;
      font-size: 50px;
      cursor: pointer;
      content: "\00d7";
      color: red;
    }
  
  </style>
    <div class="all-wrap">
        <div class="image-fill owl-theme owl-carousel" style="display:none">
            <img src="/assets3/image/anh-nha.png" alt="">
            <img src="/assets3/image/anh-nha.png" alt="">
            <img src="/assets3/image/anh-nha.png" alt="">
        </div>
    </div>
    <div class="all-color">
        @php
            $arr_mau = json_encode($color); 
        @endphp
        
        @foreach($color as $key=>$val)
            <div class="flex-color-plus" style="display: flex">
                <button class="color" id="color{{$val->id}}" mau="{{$val->name}}" product="{{$val->product}}" value="{{$val->id}}" style="text-transform:uppercase">{{$val->ma}}</button>
                <div class="plus{{$val->id}}" id="plus" product="{{$val->product}}" ><i class="fa fa-plus"></i></div>
            </div>    
        @endforeach
    </div>
    <div class="modals-product-color" id="modal_pro_color" style="display:none"></div>
<script>

    $('.image-fill').owlCarousel({
        items: 1,
        margin: 10,
        nav: false,
        dots: false,
        lazyLoad: true
    });
    let arr = <?=$arr_mau?>;
    let mau_get = $(this).attr('mau');
    arr.forEach(item=>{
        $('#color'+item.id).css('background-color',item.name);
    });
   
    $('.color').css('outline','none');
    $(document).on('click','.color',function(){
        let mau = $(this).attr('mau');
        let val = $(this).val();
        let product = $(this).attr('product');
        $('.plus'+val).css('display','block');
        $('.all-wrap .image-fill').css('height','500px');
        $('.all-wrap .image-fill').slideDown();
        $('.image-fill img').css('background-color',mau);
        $('.plus'+val).click(function(){
            let id_mau = val; 
            let product_detail = $(this).attr('product');
            $.ajax({
                url: "/admin/color/product",
                method: "post",
                data: { "_token": "{{ csrf_token() }}", idmau: id_mau, product: product_detail},
                success:function(datas){
                    let products ='';
                    var info = jQuery.parseJSON(datas);
                    let arr_sp_get = Object.entries(JSON.parse(info.sanpham));
                    arr_sp_get.forEach((item)=>{
                        products += `
                        <div>
                            <tr>
                                <td><img style="width:100px" alt="Ảnh sản phẩm" src="/assets/image/upload/${item[1].image}"></td>
                                <td >
                                    <a href="product/detail/${item[1].id}" style="font-size: 14px;" >${item[1].name} </a>
                                </td>
                            <tr>
                        </div>`            
                    })
                    
                    $('.modals-product-color').show();
                    $('.modals-product-color').html(`
                        
                        <div class="content-chi">
                            <form action="" style="margin: auto ; position:relative; padding: 30px ;">
                            <div class="exit-chi1" id=""></div>
                            <h2>Các sản phẩm tham khảo cho màu sơn bạn chọn</h2>
                             `+products+`
                            </form>
                        </div>

                    `);
                    $('.exit-chi1').click(function(){
                        $('.modals-product-color').hide();
                    });
                }
            })
        })
    })
</script>

@endsection