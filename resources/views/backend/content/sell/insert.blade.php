@extends('backend.layouts.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Thêm đơn hàng</h4>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{url('/admin/sell/insert')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row p-5">
                    <div class="mb-3 col-6 col-6">
                        <label for = "input-6"> Tên</label>
                        <input name ="ten" type="text" class ="form-control form-control-rounded" id="input-6" required>
                    </div>

                    <div class="mb-3 col-6">
                        <label for = "input-6"> Số điện thoại</label>
                        <input name ="dienthoai" type="text" class ="form-control form-control-rounded" id="input-6" required>
                    </div>

                    <div class="export-product">
                        <div class="item-export"  style="display:flex; justify-content: space-around">
                            <div class="tensp">
                                <p>Tên sản phẩm</p>
                                <select id= "inputStatePro"  class ="form-select" name="product_id[]">
                                    @foreach($product as $key=> $val)
                                        <option value="{{$val->id}}" price="{{$val->price}}" donvitinh = "{{$val->unit_id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                           <div class="soluong">
                                <p>Số lượng</p>
                                <div style="display: flex; align-items:center; "><input type="number" spellcheck="false" autocomplete="off" class="form-control" name="soluong[]" required><p style=" margin-bottom: 0!important"> kg</p></div>
                           </div>
                            <div class="dongia">
                                <p>Đơn giá</p>
                                <input type="text"  class="form-control" value="" class="dongia"  name="dongia[]"  value="{{$val->price}}" >
                            </div>   
                        </div>

                    </div>
                    <div class="tong-gia"></div>
                    <div class="add-item-export" ><i style="float:right" class="fa fa-plus"></i></div>
                    

                <div class ="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round px-5">Thêm</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    let i = 0;
    $('#inputStatePro').change(function(){
        let gia = $('#inputStatePro option:selected').attr('price');
        $('input[name="dongia[]"]').val(gia);
    });

    $('.fa-plus').click(function(){
        i++;
        $('.export-product').append(`
        <div class="item-export" style="display:flex; justify-content: space-around">
            <div class="tensp">
                <p>Tên sản phẩm</p>
                <select id= "inputStatePro`+i+`" class ="form-select" name="product_id[]">
                    @foreach($product as $val)
                        <option  value="{{$val->id}}" price="{{$val->price}}" donvitinh = "{{$val->unit_id}}">{{$val->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="soluong">
                <p>Số lượng</p>
                <div style="display: flex; align-items:center;"><input type="number" class="form-control" name="soluong[]" required><p style=" margin-bottom: 0!important"> kg</p></div>
            </div>
            <div class="dongia`+i+`">
                <p>Đơn giá</p>
                <input type="text"  class="form-control" value="" class="dongia"  name="dongia[]"  value="{{$val->price}}" >
            </div>   
        </div>`); 
        $('#inputStatePro'+i).change(function(){
            let gia_next = $('#inputStatePro'+i+' option:selected').attr('price');
            $('.dongia'+i+' input[name="dongia[]"]').val(gia_next);
        });  
    });

</script>
@endsection
