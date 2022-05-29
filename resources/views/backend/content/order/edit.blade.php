@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3">
        <h1>Đơn hàng nhận gọi</h1>
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
                <tr id="order{{$order_call->id}}">
                    <td  scope="row">{{$order_call['name']}}</td>
                    <td  scope="row">{{number_format($order_call->total_price)}}</td>
                    <td  scope="row">{{$order_call->note}}</td>
                </tr>
            </tbody>
        </table>
    </div>
  </body>
</html>

@endsection
