@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3">
        <h1>Đơn hàng chi tiết</h1>
    </div>
    <form action="{{url('admin/order/call',$order_id)}}" method="POST">
        @csrf
        <input type="hidden" value="{{$order_id}}" name="id">
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
                <input type="submit" name="goi" class="btn btn-info" value="Gọi"> 
                {{-- <i class="fas fa-phone"></i> --}}
                {{-- <input type="submit" name="huy" class="btn btn-danger" value="Hủy"> 
                <i class="fas fa-trash"></i> --}}
            </table>
        </div>
    </form>
  </body>
</html>

@endsection
