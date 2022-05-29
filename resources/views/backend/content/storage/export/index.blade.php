@extends('backend.layouts.index')
@section('content')
<style>
  #modal{
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
	#modal form{
			background-color: #ffffff;
			width: 800px;
      margin: 0 auto;
      margin: 100px auto;
			padding: 30px 10px 50px 10px;
  }
  #modal h1{
    text-align: center;
  }
	.rows{
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
  }		
  .item-export-paper{
      width: 50%;
  }
  .exit:before{
    display: inline-block;
    float: right;
    padding-right: 15px;
    border-radius: 50%;
    font-size: 50px;
    cursor: pointer;
    content: "\00d7";
    color: red;
  }
</style>
<div class="head-start-news mb-3">
  <h1>Danh sách phiếu xuất</h1>
  <hr>
  <a href="{{url('/admin/storage/export/add')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>
<div class="detail-main-storage">
  <table class="table ">
      <thead class="table-dark">
          <tr>
            <th  scope="row">Mã đơn</th>
            <th scope="row">Nội dung xuất hàng</th>
            {{-- <th  scope="col">Người nhập</th> --}}
            <th  scope="row">Ghi chú</th>
            <th  scope="row">Ngày xuất</th>
            <th  scope="row">Tác vụ</th>
          </tr>
      </thead>
      <tbody>
        @foreach($export as $key=> $val)
          <tr>
            <td scope="row">{{$val->ma}}</td>
            <td scope="row">{{$val->noidung}}</td>
            <td scope="row"> {{$val->ghichu}}</td>
            <td scope="row">{{$val->created_at}}</td>
            <td  scope="row" style="display: flex; justify-content: space-between">
              <button  class="btn btn-warning view_export" id="view-export" thoigian="{{$val->created_at}}" export="{{$val->id}}" nguoixuat="{{$val->nguoixuat}}" ma="{{$val->ma}}" noidung="{{$val->noidung}}" ghichu="{{$val->ghichu}}" thoigian="{{$val->created_at}}" sanpham="{{$val->sanpham}}"><i class="fas fa-eye"></i></button>
              <a href="{{url('',$val['id'])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
          </td>
          </tr>
          <div class="modal{{$val->id}}" id="modal" style="display: none; ">
            <div class="exit" id=""></div>
          </div>
        @endforeach
      </tbody>
  </table>
</div>
<script>

$('.view_export').click(function(){
  var form_data= new FormData();
  var id = $(this).attr('export');
  var nguoixuat = $(this).attr('nguoixuat');
  var ma = $(this).attr('ma');
  var noidung = $(this).attr('noidung');
  var ghichu = $(this).attr('ghichu');
  var thoigian = $(this).attr('thoigian');
  var sanpham = $(this).attr('sanpham');
  form_data.append('id',id);
  form_data.append('nguoixuat',nguoixuat);
  form_data.append('ma',ma);
  form_data.append('noidung',noidung);
  form_data.append('ghichu',ghichu);
  form_data.append('thoigian',thoigian);
  form_data.append('sanpham',sanpham);
  form_data.append('thoigian',thoigian);
  $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: "POST",
      data: form_data,
      processData: false,
      contentType: false,
      url: "{{route('admin.storage.export.view')}}",
      success:function(data){
        var info = jQuery.parseJSON(data.sanpham);
        var arr_get = Object.values(info);
        var tong_xuat= 0;
        var products = '';
        arr_get.forEach((item)=>{
          products += `
                <tr>
                  <td>${item.name}</td>
                  <td>${item.soluongxuat}</td>
                  <td>${item.price}</td>
                  <td>${item.unit_id}</td>
                </tr>`
                tong_xuat += item.soluongxuat * item.price; 
        })
        $('.modal'+id).show();
        $('.modal'+id).append(`
          <div class="content-export">
            <h1 style="position:absolute; z-index:1; left:0; right: 0; padding-top: 15px; ">Phiếu xuất ${data.ma}</h1>
            <form action="" style="margin-left:auto 249px; position:relative; padding: 80px ;">
              <div class="rows">
                <div class="item-export-paper">
                  <b>Người xuất</b>
                  <p>${data.nguoixuat}</p>
                </div>
                <div class="item-export-paper">
                  <b>Nội dung</b>
                  <p>${data.noidung}</p>
                </div>
                <div class="item-export-paper">
                  <b>Ghi chú</b>
                  <p>${data.ghichu}</p>
                </div>
                <div class="item-export-paper">
                  <b>Ngày xuất</b>
                  <p>${data.thoigian}</p>
                </div>
              </div>
              <table class="table" >
                <thead>
                  <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Đơn vị tính</th>
                  </tr>
                </thead>
                <tbody>
                ${products}
                </tbody>  
              </table>
              <b style="float: right">Tổng nhập: ${tong_xuat}</b>
              <button onclick="window.print()"><i class="fa fa-print"></i></button> 
            </form>
          </div>`);
          $('.exit').click(function(){
            $('.modal'+id).hide();
          })
      }
  })
});
</script>
@endsection
