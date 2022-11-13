
@extends('backend.layouts.index')
@section('content')
<div class="col-lg-12">
    <h1>Thông tin khách</h1>
    <div class="card">
        <div class="card-body">
            <hr>
            <form action="{{url('/admin/customer/update')}}" method="POST"  enctype="multipart/form-data" >
                @csrf
                <input type="hidden"  name="id" value="{{$khach->id}}" >
                <div class="row insert-khach">
                    <div class="mb-3">
                        <label for="input-6">Tên</label>
                        <input name="name" readonly type="text" value="{{$khach->name}}" class="form-control form-control-rounded" id="input-6" required>
                    </div>
                    <div class="mb-3">
                        <label for="input-6">Email</label>
                        <input name="email" type="text" value="{{$khach->email}}" class="form-control form-control-rounded" id="input-6" required>
                    </div>
                    <div class="mb-3">
                        <label for="input-6">Điện thoại</label>
                        <input name="phone" readonly type="text" value="{{$khach->phone}}" class="form-control form-control-rounded" id="input-6" required>
                    </div>
                    <div class="mb-3">
                        <label for="input-6">Địa chỉ</label>
                        <input name="address" type="text" value="{{$khach->address}}" class="form-control form-control-rounded" id="input-6" required>
                    </div>
                    <div class="mb-3">
                        <input name="submit" type="submit" value="Cập nhật" class="btn btn-success form-control-rounded" id="input-6" required>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection