@extends('backend.layouts.index')
@section('content')
    <h1>Sửa sản phẩm</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{url('/admin/product/update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{$product->id}}"  hidden>
                <div class="row">
               
                        <div class="mb-3 col-lg-6">
                            <label for = "input-6"> Tên sản phẩm </label>
                            <input name = "name" type="text" class ="form-control form-control-rounded" id="input-6" value="{{$product->name}}" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for ="input-9"> Tên loại sản phẩm</label>
                        <select id= "inputState" class ="form-select" name="category_id">
                            @foreach($cate as $val)
                                <option selected ="" value="{{$val['id']}}">{{$val['name']}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for ="input-9">Đơn vị tính</label>
                            <select id= "inputState" class ="form-select" name="unit_id">
                                @foreach($unit as $val)
                                    <option selected ="" value="{{$val['id']}}">{{$val['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for ="input-9"> Tên thương hiệu</label>
                            <select id= "inputState" class ="form-select" name="trademark_id">
                                @foreach($trade as $val)
                                    <option selected ="" value="{{$val['id']}}">{{$val['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6"> Giá </label>
                            <input name ="price" type="number\" class ="form-control form-control-rounded" value="{{$product->price}}" id="input-6" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6"> Giá khuyến mại</label>
                            <input name = "price_sale" type="number" class ="form-control form-control-rounded" value="{{$product->price_sale}}" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6"> Thành phần</label>
                            <input name = "ingredient" type="text" class ="form-control form-control-rounded" value="{{$product->ingredient}}" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6"> Màu sắc</label>
                            <input name = "color" type="text" class ="form-control form-control-rounded" value="{{$product->color}}" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6"> Bề mặt</label>
                            <input name = "face_paint" type="text" class ="form-control form-control-rounded" value="{{$product->face_paint}}" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6"> Hàm lượng rắn theo thể tích</label>
                            <input name = "solid_content" type="text" class ="form-control form-control-rounded" value="{{$product->solid_content}}" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6"> Tỷ trọng</label>
                            <input name = "proportion" type="text" value="{{$product->proportion}}" class ="form-control form-control-rounded" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6"> Độ dày màng sơn ướt</label>
                            <input name = "wet_paint_film" type="text" value="{{$product->wet_paint_film}}" class ="form-control form-control-rounded" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6"> Độ dày màng sơn khô</label>
                            <input name = "dry_paint_film" type="text" value="{{$product->dry_paint_film}}" class ="form-control form-control-rounded" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6">Thời gian khô</label>
                            <input name = "dry_time" type="text"value="{{$product->dry_time}}"  class ="form-control form-control-rounded" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6">Thời gian khô hoàn toàn</label>
                            <input name = "complete_dry" type="text" value="{{$product->complete_dry}}" class ="form-control form-control-rounded" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6">Khô bề mặt</label>
                            <input name = "surface_dry" type="text" value="{{$product->surface_dry}}" class ="form-control form-control-rounded" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6">Tiêu hao lý thuyết</label>
                            <input name = "theoretical_attrition" value="{{$product->theoretical_attrition}}" type="text" class ="form-control form-control-rounded" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6">Sơn lớp tiếp theo</label>
                            <input name = "paint_next_layer" type="text" value="{{$product->paint_next_layer}}" class ="form-control form-control-rounded" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6">Dụng cụ</label>
                            <input name = "tool" type="text" value="{{$product->tool}}" class ="form-control form-control-rounded" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6">Pha dung môi loãng</label>
                            <input name = "solvent" type="text" value="{{$product->solvent}}" class ="form-control form-control-rounded" id="input-6" >
                        </div>
                   
                        <div class="mb-3 col-6">
                            <label for = "input-6"> Số lượng</label>
                            <input name = "quantity" min="1"  type="number" class ="form-control form-control-rounded" value="{{$product->quantity}}" id="input-6" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for ="input-9">Trạng thái</label>
                            <select id= "inputState" class ="form-control" name="status">
                                    <option selected ="" value="0">Còn hàng</option>
                                    <option selected ="" value="1">Hết hàng</option>
                                    <option selected ="" value="2">Nổi bật</option>
                                    {{-- <option selected ="" value="3"></option> --}}
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for ="input-9"> Ảnh sản phẩm </label>
                            <div class ="img-main" style="border: 2px dashed #0087F7; border-radius:5px;">
                                <img class="img-display" >
                            </div>
                            <label for="partner-img" class="btn btn-info mt-2"> <i class="fas fa-upload"></i>Chọn ảnh
                                <input type='file' id="partner-img" name="image" accept="image/*" class="mb-2" multiple hidden />
                            </label>
                            <img class="img-display" src="/assets/image/upload/{{$product->image}}" alt="" style="width:10%;">
                        </div>
                        <div class="mb-3 col-6">
                            <label for = "input-6">Hướng dẫn thi công</label>
                            <textarea name="tutorial" id="editor1" cols="30" rows="10">{{$product->tutorial}}</textarea>

                        </div>
                        <div class="mb-3 col-6">
                            <label for ="input-9"> Mô tả</label>
                            <textarea name="description" id="editor" cols="30" rows="10">{{$product->description}}</textarea>
                        </div>
            
                        <div class ="form-group mt-3">
                            <button type="submit" class="btn btn-success btn-round px-5">Cập nhật</button>
                        </div>
                </div>
            </form>
        </div>
 
</div>
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
    }
    $("#partner-img").change(function() {
    readURL(this);
    });
    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img  class="img-display" style=" width:10%; padding:10px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#partner-img').change(function(){
        imagesPreview(this,'div.img-main');
    });
});
</script>
@endsection
