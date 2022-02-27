@extends('backend.layouts.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Thêm quyền hạn</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/admin/permission/insert')}}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Tên quyền</label>
                                <input type="text" name="name" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Đường dẫn (Route)</label>
                                <input type="text" name="route" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-success" value="Thêm">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection