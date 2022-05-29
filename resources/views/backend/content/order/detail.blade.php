@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3">
        <h1>Đơn hàng chi tiết</h1>
    </div>
    <div class="detail-main-product">
            <table class="table ">
                <thead class="table-dark">
                    <tr >
                        <th  scope="col">STT</th>
                        <th  scope="col">Sản phẩm</th>
                        <th  scope="col">Hình ảnh</th>
                        <th  scope="col">Giá</th>
                        <th  scope="col">Số lượng</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($order as $key=>$val)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$val->name}}</td>
                    <td><img src="/assets/image/upload/{{$val->image}}" alt="ảnh sơn" style="width:100%;"></td>
                    <td>{{number_format($val->price)}}</td>                   
                    <td>{{$val->soluong}}</td>
                </tr>
                @endforeach
            </tbody>
            <a  href="{{url('admin/order/call',$order_id)}}" class="btn btn-info"> <i class="fas fa-phone"></i></a>
        </table>
    </div>
  </body>
</html>

@endsection
