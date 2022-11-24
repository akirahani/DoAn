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
  .item-import-paper{
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
  .exit1:before{
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
            <?php
                $tongchi = 0;
                $thongkechi =  DB::table('thongkechi')->where('phieunhap','=',$val->id)->orderBy('id', 'DESC')->get();
              echo '<td  scope="row" style="display: flex; justify-content: space-between">'; ?>
              <button  class="btn btn-warning view_import" id="view-import" thoigian="{{$val->created_at}}" import="{{$val->id}}" nguoinhap="{{$val->nguoinhap}}" ma="{{$val->ma}}" noidung="{{$val->noidung}}" ghichu="{{$val->ghichu}}" thoigian="{{$val->created_at}}" sanpham="{{$val->sanpham}}"><i class="fas fa-eye"></i></button>
              <?php
                if($val->conlai ==0 ){
                  echo '';
                }else{
                  echo '<button  class="btn btn-info tien_chi" id="view-import" nhacungcap="'.$val->nhacungcap.'" thoigian="'.$val->created_at.'" import="'.$val->id.'" ma="'.$val->ma.'"><i class="fas fa-edit"></i></button>';
                }
              ?>
          </td>
          </tr>
          <div class="modal{{$val->id}}" id="modal" style="display: none; ">
            <div class="exit" id=""></div>
          </div>
          <div class="tienchi{{$val->id}}" id="modal" style="display: none; ">
            
          </div>
        @endforeach
      </tbody>
  </table>
</div>
<script>
const formatter = new Intl.NumberFormat('vi-VN', {
  style: 'currency',
  currency: 'VND',
});
$('.view_import').click(function(){
  var form_data= new FormData();
  var id = $(this).attr('import');
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
  form_data.append('thoigian',thoigian);
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
        var arr_get = Object.values(info);
        var tong_nhap = 0;
        var products = '';
    
        arr_get.forEach((item,i)=>{
          i++;
          products += `
                <tr>
                  <td>${i}</td>
                  <td>${item.name}</td>
                  <td>${item.id}</td>
                  <td>${item.unit_id}</td>
                  <td>${item.soluongnhap}</td>
                  <td>${formatter.format(item.gianhap)}</td>
                  
                </tr>`
                tong_nhap += item.soluongnhap * item.gianhap; 
              
        })
        $('.modal'+id).show();
        $('.modal'+id).html(`
          <div class="exit" id=""></div>
          <div class="content-import" style="height:100%; overflow-y:scroll">
            <form action="" style="margin-left:auto 249px; position:relative; padding: 30px ;">
              <div class="head-import" style="display:flex; justify-content:space-between; width: 800px;">
                <div class="left-himport">
                  <b>Đơn vị:.......</b>
                  <br>
                  <b>Bộ phận:........</b> 
                </div>
                <div class="left-himport" style="text-align:center; padding-left: 300px;">
                  <b>Mẫu số 01 - VT<b>
                  <p>(Ban hành theo Thông tư số 200/2014/TT-BTC)<br>Ngày 22/12/2014 của Bộ Tài chính</p> 
                </div>
              </div>
              <h4 style=" text-align:center; text-transform: uppercase">Phiếu nhập kho</h4>
              <p style=" text-align:center;">Ngày ${data.ngay} tháng ${data.thang} năm ${data.nam}</p>
              <p style="text-align:center;">Số  ${id}</p>
              <div class="thong-tin-xuat">
                <p>- Họ và tên người giao: .......................... </p>
                <p>- Nhập tại kho:....................... Địa điểm........................</p>  
              </div>
              
              <table class="table" >
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên, nhãn hiệu sản phẩm</th>
                    <th>Mã số</th>
                    <th>ĐVT</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                  </tr>
                </thead>
                <tbody>
                ${products}
                </tbody>  
              </table>
              <b style="float: left">Tổng số tiền: .....${formatter.format(tong_nhap)}...........</b>
              <br>
              <b style="float: right">Ngày ${data.ngay} tháng ${data.thang} năm ${data.nam}</b>
              <br>
              <div class="ky-ten" style="display: flex; justify-content: space-between; width: 500px; padding-bottom: 30px;">
                  <div>
                      <b>Người lập phiếu</b>
                      <br>
                      <p>(Ký, Họ tên)</p>
                  </div>
                  <div>
                    <b>Người giao hàng</b>
                    <br>
                    <p>(Ký, Họ tên)</p>
                  </div>
                  <div>
                    <b>Thủ kho</b>
                      <br>
                      <p>(Ký, Họ tên)</p>  
                  </div>
              </div>
              <button onclick="window.print()"><i class="fa fa-print"></i></button> 
            </form>
          </div>`);
          $('.exit').click(function(){
            $('.modal'+id).hide();
          })
      }
  })
});
$('.tien_chi').click(function(){
  var form_data= new FormData();
  var id = $(this).attr('import');
  var sanpham = $(this).attr('sanpham');
  var ma = $(this).attr('ma');
  var nhacungcap = $(this).attr('nhacungcap');
  form_data.append('id',id);
  form_data.append('sanpham',sanpham);
  form_data.append('ma',ma);
  form_data.append('nhacungcap',nhacungcap);
  $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: "POST",
      data: form_data,
      processData: false,
      contentType: false,
      url: "{{route('admin.storage.import.chi')}}",
      success:function(data){
        var info = jQuery.parseJSON(data.sanpham);
        var nhacungcap = jQuery.parseJSON(data.nhacungcap);
        var arr_get = Object.values(info);
        var tong_nhap = 0;
        var products = '';
        var conlai = data.conlai;
        arr_get.forEach((item)=>{
          tong_nhap += item.soluongnhap * item.gianhap; 
        })
        $('.tienchi'+id).show();
        $('.tienchi'+id).html(`
        <div class="exit1" id=""></div>
          <div class="content-import">
            <h1 style="position:absolute; z-index:1; left:0; right: 0; padding-top: 15px; ">Chi tiền phiếu nhập ${data.ma}</h1>
            <form action="" style="margin-left:auto 249px; position:relative; padding: 80px ;"> 
                <b style="float: right">Tổng nhập: ${formatter.format(tong_nhap)}</b>
                <div class="soluong">
                  <p>Tiền chi(Còn thiếu)</p>
                  <input type="number" class="form-control sotienchi`+id+`" value="${conlai}"  max="${tong_nhap}" name="tienchi[]" required>
              </div>
              <br>
              <input type="button" class="btn btn-success luuchitien`+id+`" phieunhap="`+id+`" nhacungcap="${nhacungcap}" tongnhap="${tong_nhap}" value="Lưu tiền chi" > 
            </form>
          </div>`);
   
        $('.luuchitien'+id).click(function(){
            let sotienchi = $('.sotienchi'+id).val();
            let phieunhap = $(this).attr('phieunhap');
            let ncc = $(this).attr('nhacungcap');
            let tongnhap = $(this).attr('tongnhap');
            if(parseInt(sotienchi) <= parseInt(tongnhap) ){
              $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                data: {sotienchi: sotienchi, phieunhap: phieunhap, ncc: ncc,tongnhap: tongnhap},
                url: "{{route('admin.save_chi')}}",
                success:function(datachi){
                  var manhap = datachi.ma;
                  var conlai = datachi.conlai;
                  var id_nhap = datachi.id;
                  $('.tienchi'+id).hide();
                  $('.sotienchi'+id).html(conlai);
                }
              })
            }
        });
        $('.exit1').click(function(){
          $('.tienchi'+id).hide();
        })
      }
  })
});
</script>
@endsection
