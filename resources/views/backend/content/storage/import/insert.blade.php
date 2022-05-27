@extends('backend.layouts.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Thêm phiếu nhập</h4>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{url('/admin/storage/import/insert')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row p-5">
                    <div class="mb-3 col-6 col-6">
                        <label for = "input-6"> Mã phiếu nhập</label>
                        <input name = "ma" type="text" class ="form-control form-control-rounded" id="input-6" required>
                    </div>

                    <div class="mb-3 col-6 col-6">
                        <label for ="input-9"> Người nhập</label>
                        <select id="inputState" class ="form-select" name="category_id">
                            @foreach($account as $val)
                                <option selected ="" value="{{$val['id']}}">{{$val['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-6">
                        <label for = "input-6"> Nội dung nhập</label>
                        <input name ="noidung" type="text" class ="form-control form-control-rounded" id="input-6" required>
                    </div>

                    <div class="mb-3 col-6">
                        <label for = "input-6"> Ghi chú</label>
                        <input name = "ghichu" type="text" class ="form-control form-control-rounded" id="input-6" >
                    </div>

                    <div class="import-product">
                        <div class="item-import"  style="display:flex; justify-content: space-around">
                            <div class="tensp">
                                <p>Tên sản phẩm</p>
                                <select id= "inputState"  class ="form-select" name="product_id[]">
                                    @foreach($product as $val)
                                        <option value="{{$val['id']}}" price="{{$val['price']}}" donvitinh = "{{$val['unit_id']}}">{{$val['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                           <div class="soluong">
                                <p>Số lượng</p>
                                <input type="number" class="form-control" name="soluong[]" required>
                           </div>
                            {{-- <div class="donvi">
                                    <p>Đơn vị tính</p>
                                    <input type="text" class="form-control" name="donvitinh" class="donvitinh" value="" required>
                            </div>
                            <div class="dongia">
                                <p>Đơn giá</p>
                                <input type="text"  class="form-control" value="" class="dongia"  name="dongia"  value="{{$val['price']}}" >
                            </div>    --}}
                        </div>

                    </div>
                    <div class="tong-gia"></div>
                    <div class="add-item-import" ><i style="float:right" class="fa fa-plus"></i></div>
                    

                <div class ="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round px-5">Thêm</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $('.fa-plus').click(function(){
        $('.import-product').append(`
        <div class="item-import" style="display:flex; justify-content: space-around">
            <div class="tensp">
                <p>Tên sản phẩm</p>
                <select id= "inputState" class ="form-select" name="product_id[]">
                    @foreach($product as $val)
                        <option  value="{{$val['id']}}" price="{{$val['price']}}" donvitinh = "{{$val['unit_id']}}">{{$val['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="soluong">
                <p>Số lượng</p>
                <input type="number" class="form-control" name="soluong[]" required>
            </div>
        </div>`);   
    });

</script>
@endsection