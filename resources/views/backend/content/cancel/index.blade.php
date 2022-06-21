@extends('backend.layouts.index')
@section('content')
<div class="head-start-news mb-3">
  <h1>Danh sách lý do hủy</h1>
  <hr>
  <a href="{{url('/admin/cancel/insert')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>
<div class="detail-main-cancel">
  <table class="table ">
      <thead class="table-dark">
        <tr>
            <th  scope="col">Tên lý do</th>
            <th  scope="row">Tác vụ</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cancel as $val)
            <tr id="cancel{{$val->id}}">
                <td  scope="row">{{$val['name']}}</td>
                <td  scope="row">
                    <a href="{{url('/admin/cancel/edit',$val['id'])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
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
                url: "/admin/cancel/delete/"+id,
                data: {
                    'id':id
                },
                success:function(data){
                    $('#cancel'+id).remove();
                }
            })
        }
    });
</script>
@endsection
