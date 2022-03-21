@extends('backend.layouts.index')
@section('content')
<div class="head-start-news mb-3">
  <h1>Danh sách sản phẩm</h1>
  <hr>
  <a href="{{url('/admin/product/insert')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>
<div class="detail-main-product">
  <table class="table ">
      <thead class="table-dark">
          <tr >
              <th  scope="col">Tên sản phẩm</th>
              <th  scope="col">Tên thương hiệu</th>
              <th  scope="col">Ảnh sản phẩm</th>
              <th  scope="row">Tác vụ</th>
          </tr>
      </thead>
      <tbody>
          @foreach($product as $val)
          <tr id="product{{$val->id}}">
              <td  scope="row">{{$val['name']}}</td>
              <td  scope="row">{{$val['godname']}}</td>
              <td class="image-son" scope="row">
                  <img src="/assets/image/upload/{{$val['image']}}" alt="" style="">
              </td>
              <td  scope="row">
                  <a href="{{url('/admin/product/edit',$val['id'])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
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
                  url: "/admin/product/delete/"+id,
                  data: {
                      'id':id
                  },
                  success:function(data){
                      $('#product'+id).remove();
                  }
              })
          }
    });
</script>
@endsection
