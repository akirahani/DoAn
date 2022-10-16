@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3">
        <h1>Khách</h1>
        <hr>
        <a href="{{url('/admin/customer/add')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
    </div>
    <div class="detail-main-customer">
        <table class="table ">
            <thead class="table-dark">
                <tr >
                    <th  scope="col">STT</th>
                    <th  scope="col">Tên</th>
                    <th  scope="col">Số điện thoại</th>
                    <th  scope="row">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($khach as $key=> $val)
                <tr id="customer{{$val->id}}">
                    <td  scope="row">{{$key+1}}</td>
                    <td  scope="row">{{$val['name']}}</td>
                    <td  scope="row">{{$val['phone']}}</td>
                    <td>
                        <a href="{{url('/admin/customer/edit',$val['id'])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
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
                    url: "/admin/customer/delete/"+id,
                    data: {
                        'id':id
                    },
                    success:function(data){
                        $('#customer'+id).remove();
                    }
                })
            }
        });
    </script>
    
  </body>
</html>

@endsection
