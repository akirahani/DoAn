@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3">
        <h1>Loại sản phẩm</h1>
        <hr>
        <a href="{{url('/admin/category/add')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
    </div>
    <div class="detail-main-category">
        <table class="table ">
            <thead class="table-dark">
                <tr >
                    <th  scope="col">STT</th>
                    <th  scope="col">Tên Danh mục</th>
                    <th  scope="col">Danh mục cha</th>
                    <th  scope="row">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $key=> $val)
                <tr id="category{{$val->id}}">
                    <td  scope="row">{{$key+1}}</td>
                    <td  scope="row">{{$val['name']}}</td>
                    <td  scope="row">{{$val['parent_id']}}</td>
                    <td>
                        <a href="{{url('/admin/category/edit',$val['id'])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a data-id ="{{$val->id}}" class="btn btn-danger del"><i class="fas fa-trash"></i></a>
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
                    url: "/admin/category/delete/"+id,
                    data: {
                        'id':id
                    },
                    success:function(data){
                        $('#category'+id).remove();
                    }
                })
            }
        });
    </script>
    
  </body>
</html>

@endsection
