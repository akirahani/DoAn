@extends('backend.layouts.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Sửa vai trò</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/admin/role/update')}}" method="POST" >
                    @csrf
                    <input type="text" name="id" value="{{$role->id}}" hidden>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Tên vai trò</label>
                                <input type="text" name="name" class="form-control" value="{{$role->name}}" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Tên hiển thị</label>
                                <input type="text" name="display_name" class="form-control" value="{{$role->display_name}}">
                            </div>
                        </div>
                        </div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Quyền hạn</label>
                                @foreach ($permissions as $permission)
                                    <div class="p-3 all-permission">
                                        <input name="permission[]" type="checkbox"  value="{{$permission->id}}"  
                                        @if (in_array($permission->id, $role->permission()->pluck('id')->toArray())) checked @endif>
                                        {{trans('translate.'.$permission->name)}}
                                    </div>
                                @endforeach  
                            </div>
                        <div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success" value="Cập nhật">
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