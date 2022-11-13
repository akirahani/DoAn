@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3">
        <h1>Đơn hàng bán trực tiếp</h1>
        <a href="{{url('/admin/sell/add')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
    </div>
    <div class="detail-main-product">
            <table class="table ">
                <thead class="table-dark">
                    <tr >
                        <th  scope="col">STT</th>
                        <th  scope="col">Tên khách</th>
                        <th  scope="col">Tổng giá</th>
                        <th  scope="col">Ghi chú</th>
                        <th  scope="row">Tác vụ</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($order as $key=>$val)
                <tr id="order{{$val->id}}">
                    <td  scope="row">{{$key+1}}</td>
                    <td  scope="row">{{$val->name}}</td>
                    <td  scope="row">{{number_format($val->total_price)}}đ</td>
                    <td  scope="row">{{$val->note}}</td>
                    <td>
                        <a href="{{url('/admin/sell/detail',$val->id)}}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
  </body>
</html>

@endsection
