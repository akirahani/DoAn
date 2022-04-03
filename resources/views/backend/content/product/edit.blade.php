@extends('backend.layouts.index')
@section('content')
<div class="col-lg-6">
    <h1>Sửa sản phẩm</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{url('/admin/product/update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{$product->id}}"  hidden>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for = "input-6"> Tên sản phẩm </label>
                            <input name = "name" type="text" class ="form-control form-control-rounded" id="input-6" value="{{$product->name}}" required>
                        </div>

                        <div class="mb-3">
                            <label for ="input-9"> Tên loại sản phẩm</label>
                        <select id= "inputState" class ="form-control" name="category_id">
                            @foreach($cate as $val)
                                <option selected ="" value="{{$val['id']}}">{{$val['name']}}</option>
                            @endforeach
                        </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for ="input-9"> Tên thương hiệu</label>
                            <select id= "inputState" class ="form-control" name="trademark_id">
                                @foreach($trade as $val)
                                    <option selected ="" value="{{$val['id']}}">{{$val['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for ="input-9"> Ảnh sản phẩm </label>
                            <div class ="img-main" style="border: 2px dashed #0087F7; border-radius:5px;">
                                <img class="img-display">
                            </div>
                            <label for="partner-img" class="btn btn-info mt-2"> <i class="fas fa-upload"></i>Chọn ảnh
                                <input type='file' id="partner-img" name="image" accept="image/*"  class="mb-2" multiple hidden />
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for = "input-6"> Giá </label>
                            <input name ="price" type="number\" class ="form-control form-control-rounded" value="{{$product->price}}" id="input-6" required>
                        </div>
                        <div class="mb-3">
                            <label for = "input-6"> Giá khuyến mại</label>
                            <input name = "price_sale" type="number" class ="form-control form-control-rounded" value="{{$product->price_sale}}" id="input-6" >
                        </div>
                        <div class="mb-3">
                            <label for = "input-6"> Số lượng</label>
                            <input name = "quantity" type="number" class ="form-control form-control-rounded" value="{{$product->quantity}}" id="input-6" >
                        </div>
                        <div class="mb-3">
                            <label for ="input-9">Trạng thái</label>
                            <select id= "inputState" class ="form-control" name="status">
                                    <option selected ="" value="0">Còn hàng</option>
                                    <option selected ="" value="1">Hết hàng</option>
                                    <option selected ="" value="2">Nổi bật</option>
                                    {{-- <option selected ="" value="3"></option> --}}
                            </select>
                        </div>
                        <div class="mb-3">
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
