
@extends('backend.layouts.index')
@section('content')
<div class="col-lg-12">
    <h1>Sửa loại sản phẩm</h1>
    <div class="card">
        <div class="card-body">
            <hr>
            <form action="{{url('/admin/category/update')}}" method="POST"  enctype="multipart/form-data" >
                @csrf
                <input type="hidden"  name="id" value="{{$category->id}}" >
                <div class="row insert-customer">
                    <div class="mb-3">
                        <label for="input-6">Tên</label>
                        <input name="name" type="text" value="{{$category->name}}" class="form-control form-control-rounded" id="input-6" required>
                    </div>
                    <div class="mb-3">
                        <label for="input-7">Hướng dẫn</label>
                        <textarea name="manual" id="editor" class="form-control">{{$category->manual}} </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="input-7">Danh mục cha</label>
                        <select name="parent_id" class="form-select" id="">
                            <option value="{{$category->parent_id}}">Chọn</option>
                            {!!$level!!}
                        </select>
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
@endsection