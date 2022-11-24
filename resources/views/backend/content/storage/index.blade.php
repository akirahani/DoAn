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
  <h1>Danh sách sản phẩm trong kho</h1>
</div>
<div class="detail-main-storage">
  <table class="table ">
      <thead class="table-dark">
          <tr>
            <th  scope="row">Sản phẩm</th>
            <th scope="row">Nhà cung cấp</th>
            <th  scope="row">Số lượng</th>
            <th  scope="row">Đơn giá nhập</th>
            <th  scope="row">Đơn vị</th>
          </tr>
      </thead>
      <tbody>
        @foreach($hangton as $key=> $val)
        @php
            $sanpham = DB::table('products')->select('name','id')->get();
            $ncc = DB::table('suppliers')->select('ten','id')->get();
            $donvi = DB::table('units')->select('name','id')->get();
            $arr_sp = [];
            foreach($sanpham as $valsp){
                $arr_sp[$valsp->id] = $valsp->name;
            }
            $arr_ncc = [];
            foreach($ncc as $valncc){
                $arr_ncc[$valncc->id] = $valncc->ten;
            }
            $units = [];
            foreach($donvi as $valdv){
              $units[$valdv->id] = $valdv->name;
            }
        @endphp
          <tr>
            <td scope="row">{{ $arr_sp[$val->product]}}</td>
            <td scope="row">{{$arr_ncc[$val->supplier]}}</td>
            <td scope="row"> {{$val->quantity}}</td>
            <td scope="row">{{number_format($val->price)}}đ</td>
            <td scope="row">{{$units[$val->unit]}}</td>
        </tr>    
        @endforeach
      </tbody>
  </table>
</div>
<form action="{{url('admin/hangton')}}" method="POST">
  @csrf
  <input type="submit" name="export " class="btn btn-warning" value="Xuất file">
</form>
@endsection
