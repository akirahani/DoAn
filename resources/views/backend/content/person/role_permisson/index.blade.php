@extends('backend.layouts.index')
@section('content')
<div class="head-start-role mb-3">
    <h1>Vai trò</h1>
    <hr>
    <a href="{{url('/admin/role/add')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
  </div>
  
  <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tên hiển thị</th>
          <th scope="col">Vai trò</th>
          <th scope="col">Tác vụ</th>
        </tr>
      </thead>
      <tbody class="border">
        @foreach($role as $key=>$val)
          <tr id="role{{$val->id}}">
            <th scope="row">{{$key+1}}</th>
            <td>{{$val->display_name}}</td>
            <td>{{$val->name}}</td>
            <td>
              <a class="btn btn-info" href="{{url('/admin/role/edit',$val->id)}}">
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
          let conf = confirm("Bạn muốn xóa tài quyền này ?"); 
          if(conf== true){
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "/admin/role/delete/"+id,
              type: "GET",
              data: {
                'id':id
              },
              success:function(data){
                $('#role'+id).remove();
              }
  
            });
          }
      });
</script>
@endsection