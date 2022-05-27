@extends('backend.layouts.index')
@section('content')
<div class="head-start-news mb-3">
  <h1>Danh sách đơn nhập</h1>
  <hr>
  <a href="{{url('/admin/storage/import/add')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>
<div class="detail-main-storage">
  <table class="table ">
      <thead class="table-dark">
          <tr>
            <th  scope="row">STT</th>
            <th  scope="row">Mã đơn</th>
            <th scope="row">Nội dung nhập hàng</th>
            {{-- <th  scope="col">Người nhập</th> --}}
            <th  scope="row">Ghi chú</th>
            <th  scope="row">Ngày nhập</th>
            <th  scope="row">Tác vụ</th>
          </tr>
      </thead>
      <tbody>
        @foreach($import as $key=> $val)
          <tr>
            <td scope="row">{{$key+1}}</td>
            <td scope="row">{{$val->ma}}</td>
            <td scope="row">{{$val->noidung}}</td>
            <td scope="row"> {{$val->ghichu}}</td>
            <td scope="row">{{$val->created_at}}</td>
            <td  scope="row">
              <a href="{{url('',$val['id'])}}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
              <a href="{{url('',$val['id'])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
              <a data-id ="{{$val->id}}" class="btn btn-danger del"> <i class="fas fa-trash"></i></a>
          </td>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>
@endsection
