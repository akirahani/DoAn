<link rel="stylesheet" href="{{ asset('assets3/css/content/product_hot.css') }}">
 
<div class="all-wrapper-product-hot p-4 container p-5"  >
    <div class="title-product-hot">
        <h2>Sản phẩm nổi bật</h2>
    </div>
    <div class="row pt-3">
        @foreach($product_hot as $val)
        <div class="col-lg-3l col-xl-3 col-md-6 col-sm-6 col-xs-12">
            <div class="product-thumb " style="">
                <div class="thumb-image">
                    <div class="image">
                        <a href="#">
                            <img src="assets/image/upload/{{$val->image}}"
                                alt="Bột trét tường" style="padding: 15%">
                        </a>
                    </div>
                </div>
                <div class="caption text-center">
                    <a href="https://lusunpaint.com/bot-tret-tuong" title="Bột trét tường">
                        <h5 class="name text-uppercase">{{$val->name}}</h5>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
