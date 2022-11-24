{{-- @extends('backend.layouts.index')
@section('content') --}}
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
    p{
        font-size: 14px!important;
        line-height: 16px;
    }
</style>
<link rel="stylesheet" href="{{asset('css-product/style.css')}}" type="text/css" />

        <!-- preloader css -->
        <link rel="stylesheet" href="{{asset('assets2/css/preloader.min.css')}}" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{asset('assets2/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets2/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets2/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    
    <div class="head-import" style="display:flex; justify-content:space-between; width: 60%; margin: auto;">
        <div class="left-himport">
          <b>Bộ phận:........</b> 
        </div>
        <div class="left-himport" style="text-align:center; padding-left:300px;">
          <b>Mẫu số 06 - VT<b>
          <p>(Ban hành theo Thông tư số 200/2014/TT-BTC)<br>Ngày 22/12/2014 của Bộ Tài chính</p> 
        </div>
    </div>
    <div class="info-import" style="width: 60%; margin: auto;">
        <p style=" text-align:center; text-transform: uppercase">Đơn đặt hàng</p>
        <p style=" text-align:center;">Ngày {{date('d',strtotime($order_detail->created_at))}} tháng {{date('m',strtotime($order_detail->created_at))}} năm {{date('Y',strtotime($order_detail->created_at))}}</p>
        <p style="text-align:center;">Số ...{{$order_detail->id}}....</p>
        <div class="head-start-account" >
            <div ><p>- Họ và tên người mua: {{$order_detail->name}}</p></div>
            <div ><p>- Địa chỉ: ......{{$order_detail->address}}..............</p></div>
            <div ><p>- Số điện thoại: {{$order_detail->tel}}</p></div>
            <div><p>- Công ty TNHH Sơn Lê Sáu</p></div>
            {{-- <div ><p>Mã đơn: L{{$order_detail->loai}}{{strtotime($order_detail->created_at)}} </p></div> --}}
        </div>
    </div>
    @php
        $arr_sp = [];
        $sanpham = DB::table('products')->select('id','name')->get();
        foreach($sanpham as $val_sp){
            $arr_sp[$val_sp->id] = $val_sp->name;
        }
       
    @endphp
    
    <div class="detail-main-product" style="width: 60%; margin: auto; ">
            <table class="table ">
                <thead class="">
                    <tr style="font-size: 14px!important">
                        <th   scope="col">STT</th>
                        <th  scope="col">Tên mặt hàng</th>
                        <th  scope="col">ĐVT</th>
                        <th  scope="col">Số lượng</th>
                        <th  scope="col">Đơn giá</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($product_order as $key=>$val)
                <tr id="order" style="font-size: 14px!important">
                    <td  scope="row">{{$key+1}}</td>
                    <td  scope="row">{{$arr_sp[$val->product_id]}}</td>
                    <td  scope="row">Kg</td>
                    <td  scope="row">{{$val->quantity}}</td>
                    <td  scope="row">{{number_format($val->price)}}</td>
                    <td></td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <div>Tổng tiền: {{number_format($order_detail->total_price)}}đ</div>
        <div>*Ghi chú:.....</div>
        <div>*Hình thức thanh toán:.....</div>
        <div class="ky-ten" style="display: flex; justify-content: space-between; padding-top: 5px;">
            <div>
                <b>Người mua</b>
                <br><br><br>
                <p>(Ký, Họ tên)</p>
            </div>
            <div>
              <b>Người lập</b>
                <br><br><br>
                <p>(Ký, Họ tên)</p>  
            </div>
        </div>
        <button onclick="window.print()"><i class="fa fa-print"></i></button>
    </div>
  </body>
</html>

{{-- @endsection --}}
