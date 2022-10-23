@extends('backend.layouts.index')
@section('content')
    <h1>Sửa sản phẩm</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{url('/admin/supplier/update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{$supplier->id}}"  hidden>
                <div class="row">
                   
                    <div class="mb-3 col-6 col-6">
                        <label for = "input-6"> Tên nhà cung cấp</label>
                        <input name = "ten" type="text"  value="{{$supplier->ten}}" class ="form-control form-control-rounded" id="input-6" required>
                    </div>

                    <div class="mb-3 col-6 col-6">
                        <label for ="input-9"> Thương hiệu</label>
                        <select id= "inputState" class ="form-select" name="thuonghieu">
                            @foreach($trademark as $val)
                                @if($val->id == $supplier->thuonghieu)
                                    <option selected value="{{$val['id']}}">{{$val['name']}}</option>
                                @else
                                    <option  value="{{$val['id']}}">{{$val['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-6">
                        <label for ="input-9"> Địa chỉ</label>
                        <input name = "diachi" value="{{$supplier->diachi}}" type="text" class ="form-control form-control-rounded" id="input-6" >
                    </div>
                <div class ="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round px-5">Cập nhật</button>
                </div>
            </div>

                </div>
            </form>
        </div>
 
</div>
@endsection
