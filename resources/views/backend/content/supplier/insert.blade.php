@extends('backend.layouts.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Thêm nhà cung cấp</h4>
        </div>
    </div>
</div>

        <div class="card">
            <div class="card-body">
                <form action="{{url('/admin/supplier/insert')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                   
                            <div class="mb-3 col-6 col-6">
                                <label for = "input-6"> Tên nhà cung cấp</label>
                                <input name = "ten" type="text" class ="form-control form-control-rounded" id="input-6" required>
                            </div>

                            <div class="mb-3 col-6 col-6">
                                <label for ="input-9"> Thương hiệu</label>
                                <select id= "inputState" class ="form-select" name="thuonghieu">
                                    @foreach($trademark as $val)
                                        <option selected ="" value="{{$val['id']}}">{{$val['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
 
                            <div class="mb-3 col-6">
                                <label for ="input-9"> Địa chỉ</label>
                                <input name = "diachi" type="text" class ="form-control form-control-rounded" id="input-6" >
                            </div>
                        <div class ="form-group mt-3">
                            <button type="submit" class="btn btn-success btn-round px-5">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
@endsection
