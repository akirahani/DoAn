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
                            <label for ="input-9"> Tên Thương hiệu</label>
                        <select id= "inputState" class ="form-control" name="godname">
                            @foreach($category as $val)
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
                                <input type='file' id="partner-img" name="image" accept="image/*" required class="mb-2"  multiple hidden required/>
                            </label>
                        </div>

                        {{-- <div class="mb-3">
                            <label class="form-label">MinDate and MaxDate</label>
                            <input type="text" class="form-control" id="datepicker-minmax">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Disabling dates</label>
                            <input type="text" class="form-control" id="datepicker-disable">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Selecting multiple dates</label>
                            <input type="text" class="form-control" id="datepicker-multiple">
                        </div>

                        <div>
                            <label class="form-label">Range</label>
                            <input type="text" class="form-control" id="datepicker-range">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label class="form-label">Timepicker</label>
                                <input type="text" class="form-control" id="datepicker-timepicker">
                            </div>

                            <div>
                                <label class="form-label">Inline Date Picker Demo</label>
                                <input type="text" class="form-control" id="datepicker-inline">
                            </div>
                        </div>
                    </div> --}}
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
