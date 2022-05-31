@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3">
        <h1>Xác nhận đơn hàng</h1>
    </div>
    <form action="{{url('admin/order/respose')}}" method="POST">
        @csrf
        <input type="hidden" value="{{$order->id}}" name="id">
        <p>Tên khách</p>
        <input type="text" class="form-control" value="{{$order->name}}" readonly/><br>
        <p>Số điện thoại</p>
        <input type="text" class="form-control" value="{{$order->tel}}" readonly /><br>
        <p>Địa chỉ</p>
        <input type="text" class="form-control" value="{{$order->address}}" readonly /><br>
        <p>Ghi chú</p>
        <textarea name="" id="" cols="30" rows="10" class="form-control">{{$order->note}}</textarea><br>
        <table class="table ">
            <thead class="table-dark">
                <tr>
                    <th hidden></th>
                    <th  scope="col">STT</th>
                    <th  scope="col">Sản phẩm</th>
                    <th  scope="col">Hình ảnh</th>
                    <th  scope="col">Giá</th>
                    <th  scope="col">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order_detail as $key=>$val)
                    <tr>
                        <td hidden><input type="hidden" name="sanpham[]" value="{{$val->sanpham}}"></td>
                        <td>{{$key+1}}</td>
                        <td>{{$val->name}}</td>
                        <td><img src="/assets/image/upload/{{$val->image}}" alt="ảnh sơn" style="width:20%;"></td>
                        <td>{{number_format($val->price)}}</td>                   
                        <td><input type="number" name="soluong[]"  readonly value="{{$val->soluong}}" ></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" name="goi" class="btn btn-info" value="Xuất hàng"> 
        <input type="submit" name="huy" class="btn btn-danger" value="Hủy đơn"> 
    </form>
  </body>
</html>

@endsection
