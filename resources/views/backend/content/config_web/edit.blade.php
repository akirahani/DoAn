@extends('backend.layouts.index')
@section('content')
<div class="all_config_web_edit">
    <div class="col-lg-12">
        <h1>Sửa cấu hình web</h1>
        <div class="card">
            <div class="card-body">
                <hr>
                <form action="{{url('/admin/config/update')}}" method="POST"  enctype="multipart/form-data" >
                    @csrf
                    <div class="row insert-customer">
                        <input type="text" name="id" value="{{$config->id}}" hidden>
                        <div class="mb-3 col-lg-6">
                            <label for="input-6">Tên</label>
                            <input name="name" type="text" class="form-control form-control-rounded" value="{{$config->name}}" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="input-7">Địa chỉ</label>
                            <input name="address" type="text" class="form-control form-control-rounded" value="{{$config->address}}"  required>
                        </div>
                     
                        <div class="mb-3 col-lg-6">
                            <label for="input-9">Số liên hệ</label>
                            <input type='text' class="form-control form-control-rounded"  name="tel" value="{{$config->tel}}" required/>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="input-9">Mô tả</label>
                            <input type='text' class="form-control form-control-rounded"  name="description" value="{{$config->description}}" required/>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="input-9">Mô tả phụ</label>
                            <input type='text' class="form-control form-control-rounded"  name="sub_description" value="{{$config->sub_description}}" required/>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="input-9">Facebook</label>
                            <input type='text' class="form-control form-control-rounded"  name="facebook" value="{{$config->facebook}}" required/>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="input-9">Instagram</label>
                            <input type='text' class="form-control form-control-rounded"  name="instagram" value="{{$config->instagram}}" required/>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="input-9">Twitter</label>
                            <input type='text' class="form-control form-control-rounded"  name="twitter" value="{{$config->twitter}}" required/>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="input-9">Logo</label>
                            <div class="img-main" style="border: 2px dashed #0087F7; border-radius: 5px;">
                                <img  class="img-display"/> 
                                <img name="logo" src="/assets/image/config/favicon/{{$config->logo}}" alt="" style="width:10%;">
                            </div>
                            <label for="partner-img" class="btn btn-info mt-2 "><i class="fas fa-upload"></i>Chọn ảnh
                                <input type='file'  id="partner-img" name="logo" accept="image/*"    class=" mb-2"  multiple hidden required />
                           
                            </label> 
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="input-9">Favicon</label>
                            <div class="favicon" style="border: 2px dashed #0087F7; border-radius: 5px;">
                                <img  class="favicon"/> 
                                <img name="favicon" src="/assets/image/config/logo/{{$config->favicon}}" alt="" style="width:10%;">
                            </div>
                            <label for="favicon" class="btn btn-info mt-2 "><i class="fas fa-upload"></i>Chọn ảnh
                                <input type='file'  id="favicon" name="favicon" accept="image/*"    class=" mb-2"  multiple hidden required />
                           
                            </label> 
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success btn-round px-5"></i>
                           Cập nhật</button>
                    </div>
                </form>
            </div>
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
// 
function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  $("#favicon").change(function() {
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
                    $($.parseHTML('<img  class="favicon" style=" width:10%; padding:10px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#favicon').change(function(){
        imagesPreview(this,'div.favicon');
    });
});
</script>
@endsection