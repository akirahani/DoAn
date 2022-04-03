
@extends('backend.layouts.index')
@section('content')
<div class="col-lg-12">
    <h1>Thêm cấu hình web </h1>
    <div class="card">
        <div class="card-body">
            <hr>
            <form action="{{url('/admin/config/insert')}}" method="POST"  enctype="multipart/form-data" >
                @csrf
                <div class="row insert-customer">
                    <div class="mb-3">
                        <label for="input-6">Tên</label>
                        <input name="name" type="text" class="form-control form-control-rounded"  required>
                    </div>
                    <div class="mb-3">
                        <label for="input-7">Địa chỉ</label>
                        <input name="address" type="text" min="1" class="form-control form-control-rounded"  required>
                    </div>
                 
                    <div class="mb-3">
                        <label for="input-9">Logo</label>
                        <div class="logo-img" style="border: 2px dashed #0087F7; border-radius: 5px;">
                            <img class="img-display"/> 
                        </div>
                        <label for="logo-img" class="btn btn-info mt-2 "><i class="fas fa-upload"></i>Chọn ảnh
                            <input type='file' id="logo-img" name="logo" accept="image/*"   required  class=" mb-2"  multiple hidden required/>
                        </label> 
                    </div>
                    <div class="mb-3">
                        <label for="input-9">Favicon</label>
                        <div class="favicon-img" style="border: 2px dashed #0087F7; border-radius: 5px;">
                            <img class="img-display"/> 
                        </div>
                        <label for="favicon-img" class="btn btn-info mt-2 "><i class="fas fa-upload"></i>Chọn ảnh
                            <input type='file' id="favicon-img" name="favicon" accept="image/*"   required  class=" mb-2"  multiple hidden required/>
                        </label> 
                    </div>
                    <div>
                        <label for="input-9">Số điện thoại</label>
                        <input type='text' class="form-control form-control-rounded"  name="tel" required/>
                    </div>
                    <div>
                        <label for="input-9">Mô tả</label>
                        <input type='text' class="form-control form-control-rounded"  name="description" required/>
                    </div>
                    <div>
                        <label for="input-9">Mô tả phụ</label>
                        <input type='text' class="form-control form-control-rounded"  name="sub_description" required/>
                    </div>
                    <div>
                        <label for="input-9">Facebook</label>
                        <input type='text' class="form-control form-control-rounded"  name="facebook" required/>
                    </div>
                    <div>
                        <label for="input-9">Instagram</label>
                        <input type='text' class="form-control form-control-rounded"  name="instagram" required/>
                    </div>
                    <div>
                        <label for="input-9">Twitter</label>
                        <input type='text' class="form-control form-control-rounded"  name="twitter" required/>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round px-5"></i>
                        Thêm</button>
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
  $("#logo-img").change(function() {
    readURL(this);
  });
  $("#favicon-img").change(function() {
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

    $('#favicon-img').change(function(){
        imagesPreview(this,'div.favicon-img');
    });
    $('#logo-img').change(function(){
        imagesPreview(this,'div.logo-img');
    });

  });

// 
// document.getElementById("price").onblur =function (){    

// this.value = parseFloat(this.value.replace(/,/g, ""))
//                 .toString()
//                 .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

// }
// document.getElementById("price1").onblur =function (){    

// this.value = parseFloat(this.value.replace(/,/g, ""))
//                 .toString()
//                 .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

// }

</script>
@endsection