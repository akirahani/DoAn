@extends('backend.layouts.index')
@section('content')
      <div class ="detail-content-product">
          <div class ="title-content-product" style ="display:flex">
            <h1> Loại Sản Phẩm </h1>
            <a href="{{url('/admin/category/insert')}}" style = "margin-left:70%; margin-top:1%;"><button class ="btn btn-success"> Them </button></a>
          </div>
      </div>
      <div class="detail-main-product">
        <table class="table ">
            <thead class="table-dark">
                <tr >
                    <th  scope="col">#</th>
                    <th  scope="col">Tên Danh mục</th>
                    <th  scope="col">Danh mục cha</th>
                    <th  scope="row">Tác vụ</th>
                </tr>
            </thead>
        <tbody>
            @foreach($product as $val)
            <tr id="cate-product{{$val->id}}">
                <td  scope="row">{{$val['id']}}</td>
                <td  scope="row">{{$val['name']}}</td>
                <td  scope="row">{{$val->['parent_id']}}</td>
                    <a href="{{url('/admin/category/edit',$val['id'])}}" class="btn btn-info">sua</a>
                    <a data-id ="{{$val->id}}" class="btn btn-danger del"> xoa</a>
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
                            $('#cate-product'+id).remove();
                        }
                    })
                }
          });
      </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

@endsection
