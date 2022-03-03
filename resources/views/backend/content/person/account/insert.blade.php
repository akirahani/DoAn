@extends('backend.layouts.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Thêm tài khoản</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/admin/account/insert')}}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Tên</label>
                                <input type="text" name="name" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu</label>
                                <input type="password" name="password" class="form-control flatpickr-input">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vai trò</label>
                                <select type="text" name="role" class="form-control flatpickr-input">
                                    @foreach($role as $val)
                                    <option value="{{$val->id}}">{{$val->display_name}}</option>
                                    @endforeach
                                </select>
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