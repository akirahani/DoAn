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
      margin: 10px auto;
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
            <form action="" style="margin-left:auto 249px; position:relative; padding: 30px ;">
              <div class="head-import" style="display:flex; justify-content:space-between; width: 800px;">
                <div class="left-himport">
                  <b>Đơn vị:.......</b>
                  <br>
                  <b>Bộ phận:........</b> 
                </div>
                <div class="left-himport" style="text-align:center; padding-left:300px">
                  <b>Mẫu số 02 - TT<b>
                  <p>(Ban hành theo Thông tư số .../2014/TT-BTC)<br>Ngày 22/12/2014 của Bộ Tài chính</p> 
                </div>
              </div>
              <h4 style=" text-align:center; text-transform: uppercase">Phiếu chi</h4>
              <div class="phieu-chi-flex" style=" display:flex; justify-content: center; ">
                <p style=" text-align:center;">....Ngày ${data.ngay} tháng ${data.thang} năm ${data.nam}....</p>
                <div style="disply: flex; flex-flow: column; align-items: center">
                  <p style="text-align:center; padding-left:50px">Quyển Số: .....${data.phieunhap}</p>
                  <p style="text-align:center; padding-left:50px">Số: ..... ${id_pchi}</p>
                  <p style="text-align:center; padding-left:50px">Nợ: .....${formatter.format(data.thieu)}</p>
                </div>
              </div>
              <div class="thong-tin-xuat">
                <p>- Họ và tên người nhận tiền: ....................(Đại diện cho NCC: ${data.nhacungcap} )...... </p>
                <p>- Địa chỉ:.......................</p>  
                <p>- Lý do chi:.......................</p>  
                <p>- Số tiền:..........${formatter.format(data.dachi)}.............</p>  
              </div>
              <b style="float: right">Ngày ${data.ngay} tháng ${data.thang} năm ${data.nam}</b>
              <br>
              <div class="ky-ten" style="display: flex; justify-content: space-between; width:500px; padding-bottom: 30px;">
                  <div>
                      <b>Thủ quỹ</b>
                      <br> <br> <br> <br> 
                      <p>(Ký, Họ tên)</p>
                  </div>
                  <div>
                    <b>Người lập phiếu</b>
                    <br> <br> <br> <br>
                    <p>(Ký, Họ tên)</p>
                  </div>
                  <div>
                    <b>Người nhận tiền</b>
                    <br> <br> <br> <br>
                    <p>(Ký, Họ tên)</p>  
                  </div>
              </div>
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
