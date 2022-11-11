@extends('backend.layouts.index')
@section('content')
<style>
  #modal_chi{
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
	#modal_chi form{
			background-color: #ffffff;
			width: 800px;
      margin: 0 auto;
      margin: 100px auto;
			padding: 30px 10px 50px 10px;
  }
  #modal_chi h1{
    text-align: center;
  }
	.rows{
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
  }		
  .item-chi-paper{
      width: 50%;
  }
  .exit-chi:before{
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
  <h1>Danh sách phiếu chi</h1>
</div>
<div class="detail-main-storage">
  <table class="table ">
      <thead class="table-dark">
          <tr>
            <th  scope="row">Mã đơn</th>
            <th scope="row">Nhà cung cấp</th>
            <th  scope="row">Phiêu nhập</th>
            <th  scope="row">Thiếu</th>
            <th  scope="row">Tác vụ</th>
          </tr>
      </thead>
      <tbody>
        <?php foreach($phieu_chi as $val) { 
            $ncc = DB::table('suppliers')->select('ten')->where('id','=',$val->nhacungcap)->first();   
            $ma_pn =   DB::table('imports')->select('ma','sanpham')->where('id','=',$val->phieunhap)->first();
        ?>
        <tr>
            <th  scope="row">PC<?=strtotime($val->created_at)?></th>
            <th scope="row">{{ $ncc->ten}}</th>
            <th  scope="row">{{ $ma_pn->ma}}</th>
            <th  scope="row">{{number_format($val->thieu)}}đ</th>
            <th  scope="row"><button  class="btn btn-info tien_chi_detail" thoigian="{{date('d-m-Y',strtotime($val->ngaychi))}}" sanpham="{{$ma_pn->sanpham}}" id="tien_chi_detail" ma="PC<?=strtotime($val->created_at)?>" ncc="{{ $ncc->ten}}" pnhap ="{{ $ma_pn->ma}}" conthieu="{{$val->thieu}}" value="{{$val->id}}" dachi="{{$val->tienchi}}"><i class="fas fa-edit"></i></button></th>
        </tr>
        <div class="modal{{$val->id}}" id="modal_chi" style="display: none; ">
            <div class="exit-chi" id=""></div>
        </div>
        <?php  } ?>
      </tbody>
  </table>
</div>

<script>
const formatter = new Intl.NumberFormat('vi-VN', {
  style: 'currency',
  currency: 'VND',
});
$('.tien_chi_detail').click(function(){
    var form_data= new FormData();
    var mapchi = $(this).attr('ma');
    var sanpham = $(this).attr('sanpham');
    var ncc = $(this).attr('ncc');
    var phieunhap = $(this).attr('pnhap');
    var conthieu = $(this).attr('conthieu');
    var thoigian = $(this).attr('thoigian');
    var id_pchi = $(this).val();
    var tienchi = $(this).attr('dachi');
    form_data.append('id',id_pchi);
    form_data.append('phieuchi',mapchi);
    form_data.append('sanpham',sanpham);
    form_data.append('nhacungcap',ncc);
    form_data.append('phieunhap',phieunhap);
    form_data.append('conthieu',conthieu);
    form_data.append('thoigian',thoigian);
    form_data.append('dachi',tienchi);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: "POST",
      data: form_data,
      processData: false,
      contentType: false,
      url: "{{route('admin.storage.chi.view')}}",
      success:function(data){
        let products ='';
        var info = jQuery.parseJSON(data.sanpham);
        var arr_get = Object.values(info);
        arr_get.forEach((item)=>{
          products += `
                <tr>
                  <td>${item.name}</td>
                  <td>${item.soluongnhap}</td>
                  <td>${formatter.format(item.gianhap)}</td>
                  <td>${item.unit}</td>
                </tr>`              
        })
        $('.modal'+id_pchi).show();
        $('.modal'+id_pchi).html(`
          <div class="exit-chi" id=""></div>
          <div class="content-chi">
            <h1 style="position:absolute; z-index:1; left:0; right: 0; padding-top: 15px; ">Phiếu chi ${data.ma}</h1>
            <form action="" style="margin-left:auto 249px; position:relative; padding: 80px ;">
              <div class="rows">
                <div class="item-chi-paper">
                  <b>Nhà cung cấp</b>
                  <p>${data.nhacungcap}</p>
                </div>
                <div class="item-chi-paper">
                  <b>Ngày chi</b>
                  <p>${data.thoigian}</p>
                </div>
                <div class="item-chi-paper">
                  <b>Phiếu nhập</b>
                  <p>${data.phieunhap}</p>
                </div>
                <div class="item-chi-paper">
                  <b>Số tiền đã chi</b>
                  <p>${formatter.format(data.dachi)}</p>
                </div>
              </div>
              <div>Nội dung chi</div>   
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
              <b style="float: right">Còn thiếu: ${formatter.format(data.thieu)}</b>
              <button onclick="window.print()"><i class="fa fa-print"></i></button> 
            </form>
          </div>`);
          $('.exit-chi').click(function(){
            $('#modal_chi').hide();
          })
      }
  })
});
</script>
@endsection
