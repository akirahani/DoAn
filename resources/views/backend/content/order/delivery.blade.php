@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3">
        <h1>Đơn hàng vận chuyển</h1>
    </div>
    <div class="detail-main-product">
            <table class="table ">
                <thead class="table-dark">
                    <tr >
                        <th  scope="col">Tên khách</th>
                        <th  scope="col">Tổng giá</th>
                        <th  scope="col">Ghi chú</th>
                        <th  scope="row">Tác vụ</th>
                    </tr>
                </thead>
            <tbody>
                @foreach ($order_delivery as $item)
                    <tr id="order{{$item->id}}">
                        <td  scope="row">{{$item->name}}</td>
                        <td  scope="row">{{number_format($item->total_price)}}</td>
                        <td  scope="row">{{$item->note}}</td>
                        <td  scope="row">
                            <a href="{{url('/admin/order/final',$item->id)}}" class="btn btn-warning"><i class="fas fa-spell-check"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </body>
</html>

@endsection
