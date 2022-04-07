{{-- <link rel="stylesheet" href="{{ asset('assets3/css/content/trademark.css') }}"> --}}
<div class="all-wrapper-trademark p-5">
    <div class="in-detail-trade-mark container">
        <div class="detail-trademark row">
            <div id="content" class="col-sm-12">
                <div class="title-trademark">
                    <h2>Thương hiệu</h2>
                </div>
                <div class="manufacturer-list">
                    @foreach($trademark as $val)
                    <div class="trademark-items mb-3 p-2">
                        <div class="trade-on-main row">
                            <div class="col-md-6  col-img p-5">
                                <img src="/assets/image/trademark/{{$val['img_description']}}" alt="">
                            </div>
                            <div class="col-md-6 col-info p-5 mb-5">
                                <h2 class="name-trademark text-uppercase font-weight-bold">{{$val['name']}}</h2>
                                <a href="#" class="d-block mb-3">
                                    <img src="/assets/image/trademark/logo/{{$val['logo']}}" alt="trademark"
                                        title="Hãng Sơn">
                                </a>
                                <div class="description">
                                    <p style="text-align:justify">{{$val->introduce}}</p>
                                </div>
                                <div class="text-right mt-3">
                                    <a href="#" class="btn btn-success"> Xem
                                        chi tiết <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
