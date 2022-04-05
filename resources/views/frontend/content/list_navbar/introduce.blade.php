@extends('frontend.index')
@section('content')
<style>
    .all-introduce{
        width:100%;
        height:450px;
    }
    .text-center h1{
        margin: 0 auto;
        color: rgb(208, 108, 57);
        padding-top: 200px;
        text-transform: uppercase;
    }
    /*  */
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

    .title-page h1 {
        text-align: center;
        color: rgb(208, 108, 57);
        margin-top: 2%;
    }

    .line-up {
        margin: 10px 350px 0 350px;
        height: 7px;
        border-radius: 2rem;
        background: rgb(209, 124, 19);
    }
    .detail-introduce{
        background-color:rgba(255,255,255,0.5);  
        padding: 55px; 
   
    }
    .content-introduce{
        box-shadow: 5px 10px #888888;
        border-radius: 10px;
        padding: 5px;
        margin: 0 65px 0 65px;
        
    }
    .infomation-introduce{
        font-size: 18px;
        font-weight: 500;
        line-height: 3rem;
    }
</style>
<div class="tab-in">
    <div class="inline">
        <a rel="stylesheet" href="{{ url('/') }}"><i class="fas fa-home"></i></a>
        <i class="fas fa-chevron-right"></i>
        <a class="title-news" style="padding-left:6px; color:#fff">Giới thiệu</a>
    </div>
</div>

<div class="all-introduce mt-2" style="background-image:url('assets3/image/image-introduce.jpg'); ">
    <div class="text-center">
        <h1>Introduce</h1>
    </div>
</div>
<div class="line-up"></div>
<div class="detail-introduce">
    <div class="content-introduce row">

        <div class="logo col-lg-2">
           
        </div>
        <div class="in-detail-content-introduce p-3 col-lg-8">
            <div class="wt-logo  text-left">
                <div class="logo  text-left">
                    <a href="{{ url('/') }}">
                        <img src="./assets/image/config/logo/{{ $config->logo }}" title="CÔNG TY SƠN SÁU ĐÀ NẴNG"
                            alt="CÔNG TY SƠN SÁU ĐÀ NẴNG" style="width:100px">
                    </a>
                </div>
            </div> 
            <div class="name-company">
                <span><h1>CTY Cổ phần Sơn Sáu Đà Nẵng</h1></span>
     
            </div>
            <div class="infomation-introduce p-3">
                <p>
                    Địa chỉ: {{$config->address}}
                </p>
                <p>
                    Số điện thoại: {{$config->tel}}
                 </p>
                 <p>
                    CTY Cổ phần Sơn Sáu Đà Nẵng là nơi phân phối sơn công nghệ hàng đầu Hải Phòng.  CTY Cổ phần Sơn Sáu Đà Nẵng kinh doanh và sản xuất trong các lĩnh vực: Sản xuất sơn và chất liệu phủ, hoá chất, hoá dầu, công nghệ sơn xe hơi…
                 </p>
                 <p>
                    CTY Cổ phần Sơn Sáu Đà Nẵng đã có mặt tại Việt Nam khá sớm từ Trung ra Bắc,từ Đà Nẵng cho tới thành phố cảng cảng Hải Phòng thông qua con đường xuất nhập khẩu. Với lịch sử phát triển lâu dài và mang tính quyết định, trong những năm gần đây đã đem lại cho CTY Cổ phần Sơn Sáu Đà Nẵng thành công đáng khích lệ.
                 </p>
            </div>
          
        </div>
    </div> 
</div>
@endsection




