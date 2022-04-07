@extends('backend.layouts.index')
@section('content')
<div class="head-start-news mb-3">
    <h1>Danh sách Thanh điều hướng</h1>
    <hr>
    <a href="{{url('/admin/navbar/add')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse table-dark">
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Thứ tự</th>
            <th>Đường dẫn</th>
            <th>Tác vụ</th>
        </tr>
        </thead>
        <tbody>
            @foreach($navbar as $key=>$val)
                <tr id="navbar-{{$val->id}}">
                    <td scope="row">{{$key+1}}</td>
                    <td>{{$val->title}}</td>
                    <td>{{$val->ordering}}</td>
                    <td>{{$val->link}}</td>
                    <td style="display: flex; " >
                        <a href="{{url('/admin/navbar/edit',$val->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a  data-id="{{$val->id}}" class="btn btn-danger nav-del"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>
<script>
    $('.nav-del').click(function(){
        const id = $(this).data('id');
        let cfm = confirm('Bạn muốn xóa danh mục này ?');
        if(cfm ==true){
            $.ajax({
                type: "GET",
                url: "/admin/navbar/delete/"+id,
                data:{
                    'id': id
                },
                success:function(){
                    $('#navbar-'+id).remove();
                }
            });
        }
  
    });
</script>
@endsection