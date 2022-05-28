@extends('backend.layouts.index')
@section('content')
<style>
  .modal{
		position: fixed;
		top: 63px;
		left: 0;
		display: none;
		justify-content: center;
		align-items: center;
		background-color: rgba(0,0,0, 0.6);
		width: 100%;
		height: calc(100% - 63px);
		z-index: 8;
  }
	.modal form{
			background-color: #ffffff;
			width: calc(100% - 100px);
      margin: 100px auto;
			padding: 30px 20px 50px 20px;
  }
  .modal h1{
    text-align: center;
  }
			
</style>
<div class="head-start-news mb-3">
  <h1>Danh sách đơn nhập</h1>
  <hr>
  <a href="{{url('/admin/storage/import/add')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>
<div class="detail-main-storage">
  <table class="table ">
      <thead class="table-dark">
          <tr>
            <th  scope="row">Mã đơn</th>
            <th scope="row">Nội dung nhập hàng</th>
            {{-- <th  scope="col">Người nhập</th> --}}
            <th  scope="row">Ghi chú</th>
            <th  scope="row">Ngày nhập</th>
            <th  scope="row">Tác vụ</th>
          </tr>
      </thead>
      <tbody>
        @foreach($import as $key=> $val)
          <tr>
            <td scope="row">{{$val->ma}}</td>
            <td scope="row">{{$val->noidung}}</td>
            <td scope="row"> {{$val->ghichu}}</td>
            <td scope="row">{{$val->created_at}}</td>
            <td  scope="row" style="display: flex; justify-content: space-between">
              <a  class="btn btn-warning" id="view-import" id_import="{{$val->id}}" nguoinhap="{{$val->nguoinhap}}" ma="{{$val->ma}}" noidung="{{$val->noidung}}" ghichu="{{$val->ghichu}}" thoigian="{{$val->created_at}}" sanpham="{{$val->sanpham}}"><i class="fas fa-eye"></i></a>
              <a href="{{url('',$val['id'])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
              <!-- <a data-id ="{{$val->id}}" class="btn btn-danger del"> <i class="fas fa-trash"></i></a>  -->
          </td>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>
<div class="modal" style="display: none;">
  <form action="">
    @csrf
  </form>
</div>
<script>
$('#view-import').click(function(){
  var form_data= new FormData();
  var id = $(this).attr('id_import');
  var nguoinhap = $(this).attr('nguoinhap');
  var ma = $(this).attr('ma');
  var noidung = $(this).attr('noidung');
  var ghichu = $(this).attr('ghichu');
  var thoigian = $(this).attr('thoigian');
  var sanpham = $(this).attr('sanpham');
  form_data.append('id',id);
  form_data.append('nguoinhap',nguoinhap);
  form_data.append('ma',ma);
  form_data.append('noidung',noidung);
  form_data.append('ghichu',ghichu);
  form_data.append('thoigian',thoigian);
  form_data.append('sanpham',sanpham);
  $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: "POST",
      data: form_data,
      processData: false,
      contentType: false,
      url: "{{route('admin.storage.import.view')}}",
      success:function(data){
        var info = jQuery.parseJSON(data.sanpham);
        // var info = data.sanpham; 
        info.forEach(item=>{
          console.log(item);
        })
        
        $('.modal').show();
        $('.modal form').append(`
            <h1>Phiếu nhập ${data.ma}</h1>
            <div class="item">
              <p>Người nhập</p>
              <input value="${data.nguoinhap}" readonly />
            </div>
            <div class="item">
              <p>Nội dung</p>
              <input value="${data.noidung}" readonly />
            </div>
            <div class="item">
              <p>Ghi chú</p>
              <input value="${data.ghichu}" readonly />
            </div>
            <div class="item">
              <p>Ngày nhập</p>
              
            </div>
            <table>
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Sản phẩm</th>
                  <th>Số lượng</th>
                  <th>Đơn giá</th>
                  <th>Đơn vị tính</th>
                </tr>
              </thead>
              <tbody>
                ${data.sanpham}
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>  
            </table>`);
      }
  })
});
</script>
@endsection
