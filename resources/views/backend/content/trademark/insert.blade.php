
@extends('backend.layouts.index')
@section('content')
<div class="col-lg-12">
    <h1>Thêm thương hiệu</h1>
    <div class="card">
        <div class="card-body">
            <hr>
            <form action="{{url('/admin/trademark/insert')}}" method="POST"  enctype="multipart/form-data" >
                @csrf
                <div class="row insert-customer">
                    <div class="mb-3">
                        <label for="input-6">Tên thương hiệu</label>
                        <input name="name" type="text" class="form-control form-control-rounded"  required>
                    </div>
                    <div class="mb-3">
                        <label for="input-7">Giới thiệu</label>
                        <textarea name="introduce"  min="1" class="form-control form-control-rounded"  required ></textarea>
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
                        <label for="input-9">Ảnh mô tả</label>
                        <div class="description-img" style="border: 2px dashed #0087F7; border-radius: 5px;">
                            <img class="img-display"/> 
                        </div>
                        <label for="description-img" class="btn btn-info mt-2 "><i class="fas fa-upload"></i>Chọn ảnh
                            <input type='file' id="description-img" name="img_description" accept="image/*"   required  class=" mb-2"  multiple hidden required/>
                        </label> 
                    </div>
                    <div class="mb-3">
                        <label for="input-9">Hotline</label>
                        <input name="hotline" type='text' class="form-control form-control-rounded"  name="link"/>
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
  $("#description-img").change(function() {
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

    $('#description-img').change(function(){
        imagesPreview(this,'div.description-img');
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