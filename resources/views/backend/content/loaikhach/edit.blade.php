@extends('backend.layouts.index')
@section('content')
    <h1>Sửa loại khách hàng</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{url('/admin/customer/loai/update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{$loai->id}}"  hidden>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for = "input-6">Loại khách hàng</label>
                        <input name ="ten" type="text" class ="form-control form-control-rounded" value="{{$loai->ten}}" id="input-6" required>
                    </div>
                    <div class="mb-3 col-6">
                        <label for = "input-6"> Tiền tích lũy</label>
                        <input name = "tien" type="text" class ="form-control form-control-rounded" value="{{$loai->tien}}" id="input-6"  required>
                    </div>
                    <div class="mb-3 col-6">
                        <label for = "input-6"> Phần trăm giảm</label>
                        <input name = "giam" type="text" class ="form-control form-control-rounded" value="{{$loai->giam}}" id="input-6"  required>
                    </div>
                    <div class ="form-group mt-3">
                        <button type="submit" class="btn btn-success btn-round px-5">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection
