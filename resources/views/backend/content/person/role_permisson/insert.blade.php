@extends('backend.layouts.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Thêm vai trò</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/admin/role/insert')}}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Tên vai trò</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Tên hiển thị</label>
                                <input type="text" name="display_name" class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Quyền hạn</label>
                                <div class="p-3 all-permission">
                                    @foreach ($permissions as $permission)
                                        <input type="checkbox" name="permission[]" value="{{$permission->id}}" class="flatpickr-input p-5">
                                        {{trans('translate.'.$permission->name)}}
                                     @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success" value="Thêm">
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