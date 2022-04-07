
@extends('backend.layouts.index')
@section('content')
<div class="col-lg-12">
    <h1>Thêm danh mục điều hướng</h1>
    <div class="card">
        <div class="card-body">
            <hr>
            <form action="{{url('/admin/navbar/insert')}}" method="POST"  enctype="multipart/form-data" >
                @csrf
                <div class="row insert-customer">
                    <div class="mb-3">
                        <label for="input-6">Tiêu đề</label>
                        <input name="title" type="text" class="form-control form-control-rounded"  required>
                    </div>
                    <div class="mb-3">
                        <label for="input-7">Thứ tự</label>
                        <input name="ordering" type="number" min="1" class="form-control form-control-rounded"  required>
                    </div>
                 
                    <div class="mb-3">
                        <label for="input-9">Đường dẫn</label>
                        <input type='text' class="form-control form-control-rounded"  name="link" required/>
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