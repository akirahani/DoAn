
@extends('backend.layouts.index')
@section('content')
<div class="col-lg-12">
    <h1>Thêm loại sản phẩm</h1>
    <div class="card">
        <div class="card-body">
            <hr>
            <form action="{{url('/admin/category/insert')}}" method="POST"  enctype="multipart/form-data" >
                @csrf
                <div class="row insert-customer">
                    <div class="mb-3">
                        <label for="input-6">Tên</label>
                        <input name="name" type="text" class="form-control form-control-rounded" id="input-6" required>
                    </div>
                    <div class="mb-3">
                        <label for="input-7">Hướng dẫn</label>
                        <textarea name="manual" id="editor" class="form-control"> </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="input-7">Danh mục cha</label>
                        <select class="form-select" name="parent_id" id="">
                            <option value="0"></option>
                            {!!$level!!}
                        </select>
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
@endsection