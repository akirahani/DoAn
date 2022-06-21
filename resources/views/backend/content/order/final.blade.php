@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3">
        <h1>Chốt đơn hàng</h1>
    </div>
    <form action="{{url('admin/order/closing')}}" method="POST">
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
        <input type="radio" name="luachon" class="btn btn-info" value="1" checked="">Giao hàng 
        <input type="radio" name="luachon" class="btn btn-danger" value="0" >Hủy 
        <div class="select-reason" name="lydohuy" style="width: 400px; display:none">
            <select name="lydo" id="" class="form-control mt-3 mb-3" >
                <option  value="0">Lựa chọn</option>
                @foreach($cancel as $val)
                    <option  value="{{$val->id}}">{{$val->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <input type="submit" class="btn btn-warning mt-2" value="Cập nhật đơn" />
    </form>
    <script>
        $('input[type="radio"]').click(function(){
            if($(this).val() == 0){
                $('.select-reason').slideDown(); 
            }else{
                $('.select-reason').slideUp(); 
            }

        });
    </script>
  </body>
</html>

@endsection
