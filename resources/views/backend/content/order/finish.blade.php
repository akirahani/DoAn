@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3">
        <h1>Đơn hàng hoàn thành</h1>
    </div>
    <div class="detail-main-product">
            <table class="table ">
                <thead class="table-dark">
                    <tr >
                        <th  scope="col">STT</th>
                        <th  scope="col">Tên khách</th>
                        <th  scope="col">Tổng giá</th>
                        <th  scope="col">Ghi chú</th>
                        {{-- <th  scope="row">Tác vụ</th> --}}
                    </tr>
                </thead>
            <tbody>
                @foreach($order_finish as $key=>$val)
                <tr id="order{{$val->id}}">
                    <td  scope="row">{{$key+1}}</td>
                    <td  scope="row">{{$val->name}}</td>
                    <td  scope="row">{{number_format($val->total_price)}}</td>
                    <td  scope="row">{{$val->note}}</td>
                    {{-- <td>
                        <a href="{{url('/admin/order/detail',$val->id)}}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                    </td> --}}
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
  </body>
</html>

@endsection
