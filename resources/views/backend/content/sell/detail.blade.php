@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3" style="display: grid; justify-content: space-between; grid-template-columns: repeat(auto-fill, calc(50% - 20px))">
        <div ><h4>Khách mua hàng: {{$order_detail->name}}</h4></div>
        <div ><h4>Số điện thoại: {{$order_detail->tel}}</h4></div>
        <div><h4>Ngày giao dịch: {{date('d-m-Y',strtotime($order_detail->created_at))}}</h4></div>
        <div ><h4>Mã đơn: L{{$order_detail->loai}}{{strtotime($order_detail->created_at)}} </h4></div>
    </div>
    @php
        $arr_sp = [];
        $sanpham = DB::table('products')->select('id','name')->get();
        foreach($sanpham as $val_sp){
            $arr_sp[$val_sp->id] = $val_sp->name;
        }
    @endphp
    
    <div class="detail-main-product" style="width: 80%">
            <table class="table ">
                <thead class="table-dark">
                    <tr >
                        <th  scope="col">STT</th>
                        <th  scope="col">Tên sản phẩm</th>
                        <th  scope="col">Số lượng</th>
                        <th  scope="col">Đơn giá</th>
                        <th  scope="row"></th>
                    </tr>
                </thead>
            <tbody>
                @foreach($product_order as $key=>$val)
                <tr id="order">
                    <td  scope="row">{{$key+1}}</td>
                    <td  scope="row">{{$arr_sp[$val->product_id]}}</td>
                    <td  scope="row">{{$val->quantity}}</td>
                    <td  scope="row"></td>
                    <td></td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <h2 style="color:red ;float:right">Tổng giá: {{number_format($order_detail->total_price)}}đ</h2>
    </div>
  </body>
</html>

@endsection
