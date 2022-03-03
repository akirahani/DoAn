@extends('backend.layouts.index')
@section('content')
<div class="col-lg-12">
    <h1>Sửa tin tức</h1>
    <div class="card">
        <div class="card-body">
            <!-- <div class="card-title">Round Vertical Form</div> -->
            <hr>
            <form action="{{route('news.update')}}" method="POST"  enctype="multipart/form-data" runat="server">
                @csrf
                <input type="text" value="{{$news->id}}" name ="id" hidden>
                    <div class="form-group  col-12">
                        <label for="input-6">Tiêu đề</label>
                        <input name="title" type="text" value="{{$news->title}}"  class="form-control form-control-rounded" id="input-6" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="input-7">Nội dung</label>
                        <textarea name="content" id="content" value="{!!$news->content!!}"> {!!$news->content!!}</textarea>
                    </div>
                    <div class="form-group col-12">
                        <label for="input-9">Ảnh tin tức</label>
                        <div class="img-main " style="border: 2px dashed #0087F7; border-radius: 5px;">
                            <img  class="img-display"/> 
                            <img name="image" src="/assets/image/img_news/{{$news->image}}" alt="" style="width:10%;">
                        </div>
                        <label for="partner-img" class="btn btn-info mt-2 "><i class="fas fa-upload"></i>Chọn ảnh
                            <input type='file'  id="partner-img" name="image" accept="image/*"    class=" mb-2"  multiple hidden required />
                       
                        </label> 
                    </div>
                    
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round px-5"></i>
                        Cập nhật</button>
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