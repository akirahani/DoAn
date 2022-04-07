@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3">
        <h1>Thương hiệu</h1>
        <hr>
        <a href="{{url('/admin/trademark/add')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
    </div>
    <div class="detail-main-product">
            <table class="table ">
                <thead class="table-dark">
                    <tr >
                        <th  scope="col">STT</th>
                        <th  scope="col">Tên thương hiệu</th>
                        <th  scope="col">Logo</th>
                        <th  scope="col">Ảnh mô tả</th>
                        <th  scope="row">Tác vụ</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($trademark as $key=>$val)
                <tr id="trademark{{$val->id}}">
                    <td  scope="row">{{$key+1}}</td>
                    <td  scope="row">{{$val['name']}}</td>
                    <td  scope="row"><img src="/assets/image/trademark/logo/{{$val['logo']}}" alt="logo_trademark" style="width:100%"></td>
                    <td  scope="row"><img src="/assets/image/trademark/{{$val['img_description']}}" alt="img_description_trademark" style="width:100%"></td>
                    <td>
                        <a href="{{url('/admin/trademark/edit',$val['id'])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
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
                    url: "/admin/trademark/delete/"+id,
                    data: {
                        'id':id
                    },
                    success:function(data){
                        $('#trademark'+id).remove();
                    }
                })
            }
        });
    </script>
  </body>
</html>

@endsection
