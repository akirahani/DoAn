@extends('backend.layouts.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Thêm sản phẩm</h4>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{url('/admin/unit/store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mb-3 col-6">
                    <label for = "input-6"> Tên đơn vị</label>
                    <input name = "name" type="text" class ="form-control form-control-rounded" id="input-6" required>
                </div>
                <div class="mb-3 col-6">
                    <label for = "input-6"> Mã</label>
                    <input name ="ma" type="text" class ="form-control form-control-rounded" id="input-6" required>
                </div>
                <div class ="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round px-5">Thêm</button>
                </div>
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
@endsection
