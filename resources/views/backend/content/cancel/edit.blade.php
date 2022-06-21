@extends('backend.layouts.index')
@section('content')
    <h1>Sửa Lý do hủy</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{url('/admin/cancel/update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{$cancel->id}}"  hidden>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for = "input-6">Tên đơn vị</label>
                        <input name ="name" type="text" class ="form-control form-control-rounded" value="{{$cancel->name}}" id="input-6" required>
                    </div>
                    <div class ="form-group mt-3">
                        <button type="submit" class="btn btn-success btn-round px-5">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection
