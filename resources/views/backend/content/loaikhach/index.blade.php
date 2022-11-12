@extends('backend.layouts.index')
@section('content')
<div class="head-start-news mb-3">
  <h1>Phân loại khách</h1>
  <hr>
  <a href="{{url('/admin/customer/loai/add')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>
<div class="detail-main-unit">
  <table class="table ">
      <thead class="table-dark">
        <tr>
            <th  scope="col">Loại khách</th>
            <th  scope="col">Giá tiền tích lũy</th>
            <th  scope="col">Phần trăm giảm</th>
            <th  scope="row">Tác vụ</th>
        </tr>
      </thead>
      <tbody>
        @foreach($loai as $val)
            <tr id="unit{{$val->id}}">
                <td  scope="row">{{$val->ten}}</td>
                <td  scope="row">{{$val->tien}}</td>
                <td  scope="row">{{$val->giam}}</td>
                <td  scope="row">
                    <a href="{{url('/admin/customer/loai/edit',$val->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    <a data-id ="{{$val->id}}" class="btn btn-danger del"> <i class="fas fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
      </tbody>
  </table>
</div>
<script>
    $('.del').click(function(){
        const id = $(this).data('id');
        let cfm = confirm('bạn có muốn xóa');
        if(cfm == true){
            $.ajax({
                type: "GET",
                url: "/admin/customer/loai/delete/"+id,
                data: {
                    'id':id
                },
                success:function(data){
                    $('#unit'+id).remove();
                }
            })
        }
    });
</script>
@endsection
