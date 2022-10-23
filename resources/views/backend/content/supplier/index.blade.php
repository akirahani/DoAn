@extends('backend.layouts.index')
@section('content')
<div class="head-start-news mb-3">
  <h1>Nhà cung cấp</h1>
  <hr>
  <a href="{{url('/admin/supplier/add')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>
<div class="detail-main-supplier">
  <table class="table ">
      <thead class="table-dark">
          <tr >
              <th  scope="col">Tên nhà cung cấp</th>
              <th  scope="col">Thương hiệu</th>
              <th  scope="col">Địa chỉ</th>
              <th  scope="row">Tác vụ</th>
          </tr>
      </thead>
      <tbody>
          @foreach($supplier as $val)
          <tr id="supplier{{$val->id}}">
              <td  scope="row">{{$val['ten']}}</td>
              <td  scope="row">{{$arr_ten_thuong_hieu[$val->thuonghieu]}}</td>
              <td  scope="row">{{$val->diachi}}</td>
              <td  scope="row">
                  <a href="{{url('/admin/supplier/edit',$val['id'])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
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
                  url: "/admin/supplier/delete/"+id,
                  data: {
                      'id':id
                  },
                  success:function(data){
                      $('#supplier'+id).remove();
                  }
              })
          }
    });
</script>
@endsection
