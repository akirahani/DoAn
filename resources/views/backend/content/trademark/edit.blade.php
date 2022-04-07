
@extends('backend.layouts.index')
@section('content')
<div class="col-lg-12">
    <h1>Sửa thương hiệu</h1>
    <div class="card">
        <div class="card-body">
            <hr>
            <form action="{{url('/admin/trademark/update')}}" method="POST"  enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="id" value="{{$trademark->id}}" >
                <div class="row insert-customer">
                    <div class="mb-3">
                        <label for="input-6">Tên thương hiệu</label>
                        <input name="name" type="text" class="form-control form-control-rounded" value="{{$trademark->name}}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="input-7">Giới thiệu</label>
                        <textarea name="introduce" class="form-control form-control-rounded" required >{{$trademark->introduce}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="input-9">Logo</label>
                        <div class="logo-img" style="border: 2px dashed #0087F7; border-radius: 5px;">
                            <img class="img-display" /> 
                        </div>
                        <label for="logo-img" class="btn btn-info mt-2 "><i class="fas fa-upload"></i>Chọn ảnh
                            <input type='file' id="logo-img" name="logo" accept="image/*" value=""     class=" mb-2"  multiple hidden />
                        </label> 
                        <div>
                            <img src="/assets/image/trademark/logo/{{$trademark->logo}}" alt="logo_trademark"  style="width:30%; background: #000">
                        </div>
                       
                    </div>
                    <div class="mb-3">
                        <label for="input-9">Ảnh mô tả</label>
                        <div class="description-img" style="border: 2px dashed #0087F7; border-radius: 5px;">
                            <img class="img-display"/> 
                        </div>
                 
                        <label for="description-img" class="btn btn-info mt-2 "><i class="fas fa-upload"></i>Chọn ảnh
                            <input type='file' id="description-img" name="img_description" accept="image/*" value=""  class=" mb-2"  multiple hidden />
                        </label>
                        <div>
                            <img src="/assets/image/trademark/{{$trademark->img_description}}" alt="img_descriptiong" style="width:30%">
                        </div>
                
                    </div>
                    <div class="mb-3">
                        <label for="input-9">Hotline</label>
                        <input name="hotline" type='text' class="form-control form-control-rounded" value="{{$trademark->hotline}}"  name="link"/>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success btn-round px-5"></i>
                            Cập nhật</button>
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