@extends('backend.layouts.index')
@section('content')
<div class="head-start-account mb-3">
  <h1>Tài khoản</h1>
  <hr>
  <a href="{{url('/admin/account/add')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>

<table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên</th>
        <th scope="col">Tên đăng nhập</th>
        <th scope="col">Tác vụ</th>
      </tr>
    </thead>
    <tbody class="border">
      @foreach($account as $key=>$val)
        <tr id="account{{$val->id}}">
          <th scope="row">{{$key+1}}</th>
          <td>{{$val->name}}</td>
          <td>{{$val->email}}</td>
          <td>
            <a class="btn btn-info" href="{{url('/admin/account/edit',$val->id)}}">
                <i class="fas fa-edit"></i>
            </a>
            <a data-id="{{$val->id}}" class="btn btn-danger del">
                <i class="fas fa-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
<script>
    $('.del').click(function(){
        const id = $(this).data('id');
        let conf = confirm("Bạn muốn xóa tài khoản này ?"); 
        if(conf== true){
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/admin/account/delete/"+id,
            type: "GET",
            data: {
              'id':id
            },
            success:function(data){
              $('#account'+id).remove();
            }

          });
        }
    });
</script>
@endsection