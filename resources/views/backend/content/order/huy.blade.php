@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3">
        <h1>Đơn hàng hủy</h1>
    </div>
    <div class="detail-main-product">
            <table class="table ">
                <thead class="table-dark">
                    <tr >
                        <th  scope="col">Tên khách</th>
                        <th  scope="col">Tổng giá</th>
                        <th  scope="col">Ghi chú</th>
                        <th  scope="row">Thời gian hủy</th>
                    </tr>
                </thead>
            <tbody>
                @foreach ($order_cancel as $item)
                    <tr id="order{{$item->id}}">
                        <td  scope="row">{{$item->name}}</td>
                        <td  scope="row">{{number_format($item->total_price)}}</td>
                        <td  scope="row">{{$item->note}}</td>
                        <td  scope="row">{{$item->updated_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </body>
</html>

@endsection
